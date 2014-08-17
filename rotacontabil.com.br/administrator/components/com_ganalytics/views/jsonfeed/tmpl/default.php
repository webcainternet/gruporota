<?php
/**
 * GAnalytics is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GAnalytics is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GAnalytics.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Allon Moritz
 * @copyright 2007-2010 Allon Moritz
 * @since 1.0.0
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

include('gviz_api.php');

$gaID = JRequest::getVar('gaid', 0);
$dimensions = JRequest::getVar('dimensions', '');
$metrics = JRequest::getVar('metrics', '');
$max = JRequest::getVar('max', 0);
$sort = JRequest::getVar('sort', '');
$filters = JRequest::getVar('filters', '');
$s = JRequest::getVar('start', null);
$start = $s == null ? strtotime('- 1 month') : mktime(0,0,0,substr($s, 3,2),substr($s, 0,2),substr($s, 6,4));
$e = JRequest::getVar('end', null);
$end = $e == null ? time() : mktime(0,0,0,substr($e, 3,2),substr($e, 0,2),substr($e, 6,4));
$dateRange = JRequest::getVar('daterange', 'day');

$feed = GAnalyticsUtil::getAnalyticsHandler($gaID);
$feed->set_end_date($end);
$feed->set_start_date($start);
$feed->set_parameters($dimensions, $metrics, $max, $sort, $filters);
$feed->init();
$dataTable = new GvizDataTable(JRequest::getVar('tqx', ''));
if($feed->error()) {
	$dataTable->addError('invalid_request', JText::_('JSONDFEED_VIEW_ERROR'), $feed->error());
} else {
	$data = $feed->get_items();
	if(count($data) < 1 || $data[0] instanceof SimplePie_Item_GAnalytics_Account) return '';
	//$dateFormat = $params->get('dateFormat', '%d.%m.%Y');
	$dimensions = $data[0]->get_available_dimension_names();
	$metrics = $data[0]->get_available_metric_names();


	foreach ($dimensions as $dimension) {
		$type = 'string';
		if(stripos($dimension, 'ga:date') !== false)
		$type = 'date';
		
		$dim = JText::_($dimension);
		$dataTable->addColumn($dimension, substr($dim, 0, strpos($dim, ' [ga:')), $type);
	}
	foreach ($metrics as $metric) {
		$metr = JText::_($metric);
		$dataTable->addColumn($metric, substr($metr, 0, strpos($metr, ' [ga:')), 'number');
	}

	$counter = -1;
	foreach($data as $item){
		$counter++;
		$rowId = -1;
		foreach($dimensions as $dimension) {
			$value = $item->get_dimension($dimension);
			$formatted = $value;
			if(stripos($dimension, 'ga:date') !== false){
				$value = mktime(0, 0, 0, substr($value, 4, 2), substr($value, 6, 2), substr($value, 0, 4));
				$formatted = strftime(GAnalyticsUtil::getComponentParameter('dateFormat', '%d.%m.%Y'), $value);
				if($dateRange == 'week' && strftime('%u', $value) > 1 && $counter > 0 && $counter < count($data)-1){
					break;
				}
				if($dateRange == 'month' && strftime('%e', $value) > 1 && $counter > 0 && $counter < count($data)-1){
					break;
				}
			} else {
				$value = addslashes($value);
				$formatted = $value;
				if(strlen($value) > 70)
				$formatted = substr($value, 0, 70).'...';
			}
			$rowId = $dataTable->newRow();
			$property = '';
			if(stripos($dimension, 'ga:country') !== false){
				$flag = GAnalyticsUtil::convertCountryNameToISO($value);
				if(!empty($flag))
				$property = "style: 'background-image:url(\"".JURI::root().'administrator/components/com_ganalytics/images/flags/'.strtolower($flag).".gif\"); background-repeat: no-repeat;background-position: 5px 4px;padding-left:30px;'";
			}
			$dataTable->addCell($rowId, $dimension, $value, $formatted, $property);
		}
		if($rowId == -1) continue;
		foreach($metrics as $metric) {
			$dataTable->addCell($rowId, $metric, $item->get_metric($metric));
		}
	}
}
echo $dataTable->toJsonResponse();
?>