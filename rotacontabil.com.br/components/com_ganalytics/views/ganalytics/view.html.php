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

jimport( 'joomla.application.component.view');

class GAnalyticsViewGAnalytics extends JView {

	function display($tpl = null) {
		$mainframe = &JFactory::getApplication();
		$params = &$mainframe->getParams();

		$profiles = $this->get('SelectedProfiles');
		$this->assignRef('profiles', $profiles);

		$startDate = time();
		$endDate = time();
		if($params->get('daterange', 'month') == 'advanced'){
			$tmp = $params->get('advancedDateRange', null);
			if(!empty($tmp)){
				$startDate = strtotime($tmp);
			} else {
				$tmp = $params->get('startdate', null);
				if(!empty($tmp)){
					sscanf($tmp,"%u-%u-%u", $year, $month, $day);
					$startDate = mktime(0, 0, 0, $month, $day, $year);
				}
				$tmp = $params->get('enddate', null);
				if(!empty($tmp)){
					sscanf($tmp,"%u-%u-%u", $year, $month, $day);
					$endDate = mktime(0, 0, 0, $month, $day, $year);
				}
			}
		}else{
			$range = '';
			switch ($params->get('daterange', 'month')) {
				case 'day':
					$range = '-1 day';
					break;
				case 'week':
					$range = '-1 week';
					break;
				case 'month':
					$range = '-1 month';
					break;
				case 'year':
					$range = '-1 year';
					break;
			}
			$startDate = strtotime($range);
			$endDate = time();
		}

		$dimensions = '';
		$metrics = '';
		$sort = '';
		if($params->get('type', 'visits') == 'advanced'){
			$dimensions = $params->get('dimensions', 'ga:date');
			$metrics = $params->get('metrics', 'ga:visits');
			$sort = $params->get('sort', '');
		}else{
			switch ($params->get('type', 'visitsbytraffic')) {
				case 'visits':
					$dimensions = 'ga:date';
					$metrics = 'ga:visits';
					break;
				case 'visitsbytraffic':
					$dimensions = 'ga:source';
					$metrics = 'ga:visits';
					$sort = '-ga:visits';
					break;
				case 'visitsbybrowser':
					$dimensions = 'ga:browser';
					$metrics = 'ga:visits';
					$sort = '-ga:visits';
					break;
				case 'visitsbycountry':
					$dimensions = 'ga:country';
					$metrics = 'ga:visits';
					$sort = '-ga:visits';
					break;
				case 'timeonsite':
					$dimensions = 'ga:region';
					$metrics = 'ga:timeOnSite';
					$sort = '-ga:timeOnSite';
					break;
				case 'toppages':
					$dimensions = 'ga:pagePath';
					$metrics = 'ga:pageviews';
					$sort = '-ga:pageviews';
					break;
			}
		}
		$max = $params->get('max', 1000);

		$this->assignRef('startDate', $startDate);
		$this->assignRef('endDate', $endDate);
		$this->assignRef('dimensions', $dimensions);
		$this->assignRef('metrics', $metrics);
		$this->assignRef('sort', $sort);
		$this->assignRef('max', $max);
		$this->assignRef('titleFormat', $params->get('titleFormat', ''));
		$this->assignRef('dateFormat', $params->get('dateFormat', '%d.%m.%Y'));
		$this->assignRef('params', $params );
		parent::display($tpl);
	}
}
?>
