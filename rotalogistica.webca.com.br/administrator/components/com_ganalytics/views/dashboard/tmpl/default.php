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

defined('_JEXEC') or die('Restricted access');

if(empty($this->profiles)){
	echo JText::_('DASHBOARD_VIEW_NO_PROFILES');
	return;
}

$document = &JFactory::getDocument();
$document->addScript(JURI::base().'components/com_ganalytics/libraries/jquery/jquery-1.4.2.min.js');
$document->addScript(JURI::base().'components/com_ganalytics/libraries/jquery/ui/jquery-ui-1.8.1.custom.min.js');
$document->addScript(JURI::base().'components/com_ganalytics/libraries/jquery/ext/jquery-cookie.js');
$document->addStyleSheet(JURI::base().'components/com_ganalytics/libraries/jquery/themes/ui-lightness/jquery-ui-1.8.1.custom.css');
$document->addScriptDeclaration("jQuery.noConflict();");

$scriptCode = "jQuery(document).ready(function(){\n";
$scriptCode .= "	jQuery(\"#tabs\").tabs({cookie: {expires: 30}});\n";
$scriptCode .= "	jQuery(\"#date_from\").datepicker({\n";
$scriptCode .= "		dateFormat: 'dd-mm-yy',\n";
$scriptCode .= "		changeYear: true, maxDate:0, minDate: new Date(2005, 1 - 1, 1),\n";
$scriptCode .= "		dayNames: ".GAnalyticsUtil::getDaysLong().",\n";
$scriptCode .= "		dayNamesShort: ".GAnalyticsUtil::getDaysShort().",\n";
$scriptCode .= "		dayNamesMin: ".GAnalyticsUtil::getDaysMin().",\n";
$scriptCode .= "		monthNames: ".GAnalyticsUtil::getMonthsLong().",\n";
$scriptCode .= "		monthNamesShort: ".GAnalyticsUtil::getMonthsShort()."\n";
$scriptCode .= "	});\n";
$scriptCode .= "	jQuery(\"#date_to\").datepicker({\n";
$scriptCode .= "		dateFormat: 'dd-mm-yy',\n";
$scriptCode .= "		changeYear: true, maxDate:0, minDate: new Date(2005, 1 - 1, 1),\n";
$scriptCode .= "		dayNames: ".GAnalyticsUtil::getDaysLong().",\n";
$scriptCode .= "		dayNamesShort: ".GAnalyticsUtil::getDaysShort().",\n";
$scriptCode .= "		dayNamesMin: ".GAnalyticsUtil::getDaysMin().",\n";
$scriptCode .= "		monthNames: ".GAnalyticsUtil::getMonthsLong().",\n";
$scriptCode .= "		monthNamesShort: ".GAnalyticsUtil::getMonthsShort()."\n";
$scriptCode .= "	});\n";
$scriptCode .= "	jQuery(\"#tabs\").bind(\"tabsshow\", function(event, ui) {\n";
$scriptCode .= "		window['updateGAChart'+ui.index]();\n";
$scriptCode .= "	});\n";
$scriptCode .= "});\n";
$document->addScriptDeclaration($scriptCode);

echo "<table><tr>\n";
echo "<td style=\"padding-right:20px\">".JText::_('DASHBOARD_VIEW_SELECT_PROFILES');
echo " <select id=\"profiles\" onchange=\"window['updateGAChart'+jQuery('#tabs').tabs('option', 'selected')]();\" >\n";
$selected = false;
foreach ($this->profiles as $profile) {
	if(!$selected)
	$selected = true;
	echo "	<option ".($selected?'':"selected=\"true\"")." value=\"".$profile->id."\">".$profile->profileName."</option>\n";
}
echo "</select></td>\n";
echo "<td style=\"padding-right:20px\">".JText::_('DASHBOARD_VIEW_SELECT_DATE_FROM');
echo " <input type=\"text\" id=\"date_from\" value=\"".strftime('%d-%m-%Y', strtotime('-1 month'))."\" onchange=\"window['updateGAChart'+jQuery('#tabs').tabs('option', 'selected')]();\" size=\"10\" /></td>\n";

echo "<td style=\"padding-right:20px\">".JText::_('DASHBOARD_VIEW_SELECT_DATE_TO');
echo " <input type=\"text\" id=\"date_to\" value=\"".strftime('%d-%m-%Y', time())."\" onchange=\"window['updateGAChart'+jQuery('#tabs').tabs('option', 'selected')]();\" size=\"10\" /></td>\n";
echo "<td>".JText::_('DASHBOARD_VIEW_GOOGLE_ANALYTICS_LINK')."</td>\n";
echo "<tr></table>\n";

echo "<div id=\"tabs\">\n";
if(!empty($this->statsViews)){
	echo "<ul>\n";
	$counter = 0;
	foreach ($this->statsViews as $page) {
		echo "	<li><a href=\"#tabs-".$counter."\">".$page->name."</a></li>\n";
		$counter++;
	}
	echo "</ul>\n";
	$counter = 0;
	foreach ($this->statsViews as $page) {
		echo "	<div id=\"tabs-".$counter."\">\n";
		$list = new GAnalyticsListRenderer();
		$c = $list->getChartCounter();

		$chart = null;

		$scriptCode = "function updateGAChart".$c."(dayRange){\n";
		$scriptCode .= "	var path = '".JURI::root()."administrator/components/com_ganalytics/images/dayrange/';\n";
		$scriptCode .= "	if(dayRange == null) dayRange = window.location.hash.length > 1 ? window.location.hash.substring(1) : '';\n";
		$scriptCode .= "	if(dayRange == 'day'){\n";
		$scriptCode .= "		jQuery('#gaday'+".$c.").attr('src', path+'day-32.png');\n";
		$scriptCode .= "		jQuery('#gaweek'+".$c.").attr('src', path+'week-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#gamonth'+".$c.").attr('src', path+'month-disabled-32.png');\n";
		$scriptCode .= "	}\n";
		$scriptCode .= "	if(dayRange == 'week'){\n";
		$scriptCode .= "		jQuery('#gaday'+".$c.").attr('src', path+'day-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#gaweek'+".$c.").attr('src', path+'week-32.png');\n";
		$scriptCode .= "		jQuery('#gamonth'+".$c.").attr('src', path+'month-disabled-32.png');\n";
		$scriptCode .= "	}\n";
		$scriptCode .= "	if(dayRange == 'month'){\n";
		$scriptCode .= "		jQuery('#gaday'+".$c.").attr('src', path+'day-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#gaweek'+".$c.").attr('src', path+'week-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#gamonth'+".$c.").attr('src', path+'month-32.png');\n";
		$scriptCode .= "	}\n";
		if(GAnalyticsUtil::isPROMode()){
			$chart = new GAnalyticsChartRenderer();
			$scriptCode .= "	fetchChartData".$chart->getChartCounter()."(jQuery(\"#profiles\").val(),\n";
			$scriptCode .= "		jQuery(\"#dimensions_".$c."\").val(), \n";
			$scriptCode .= "		jQuery(\"#metrics_".$c."\").val(), \n";
			$scriptCode .= "		jQuery(\"#sort_".$c."\").val(),\n";
			$scriptCode .= "		'',\n";
			$scriptCode .= "		jQuery(\"#max_".$c."\").val(),\n";
			$scriptCode .= "		jQuery(\"#date_from\").val(),\n";
			$scriptCode .= "		jQuery(\"#date_to\").val(),dayRange);\n";
		}
		$scriptCode .= "	fetchData".$c."(jQuery(\"#profiles\").val(),\n";
		$scriptCode .= "		jQuery(\"#dimensions_".$c."\").val(), \n";
		$scriptCode .= "		jQuery(\"#metrics_".$c."\").val(), \n";
		$scriptCode .= "		jQuery(\"#sort_".$c."\").val(),\n";
		$scriptCode .= "		'',\n";
		$scriptCode .= "		jQuery(\"#max_".$c."\").val(),\n";
		$scriptCode .= "		jQuery(\"#date_from\").val(),\n";
		$scriptCode .= "		jQuery(\"#date_to\").val(),dayRange);\n";
		$scriptCode .= "}\n";
		$document->addScriptDeclaration($scriptCode);

		echo "<table width=\"100%\">\n";
		echo "	<tr><td>".JText::_('DASHBOARD_VIEW_LABEL_METRICS').":</td><td><input value=\"".JText::_($page->metrics)."\" size=\"38\" disabled=\"disabled\" /></td>\n";
		echo "	<td>".JText::_('DASHBOARD_VIEW_LABEL_DIMENSIONS').":</td><td><input value=\"".JText::_($page->dimensions)."\" size=\"38\" disabled=\"disabled\" /></td></tr>\n";
		echo "	<tr><td>".JText::_('DASHBOARD_VIEW_LABEL_SORT').": </td>";
		echo "	<td><select id=\"sort_".$c."\" onchange=\"updateGAChart".$c."();\">\n";
		echo createOption('', '', $page->sort);
		echo createOption($page->dimensions, JText::_($page->dimensions), $page->sort);
		echo createOption('-'.$page->dimensions, '-'.JText::_($page->dimensions), $page->sort);
		echo createOption($page->metrics, JText::_($page->metrics), $page->sort);
		echo createOption('-'.$page->metrics, '-'.JText::_($page->metrics), $page->sort);
		echo "	</select></td>\n";
		echo "	<td>".JText::_('DASHBOARD_VIEW_LABEL_MAX').": </td><td><input id=\"max_".$c."\" value=\"".$page->max_result."\" onchange=\"updateGAChart".$c."();\" size=\"10\" /></td>\n";
		echo "	<td><button onclick=\"updateGAChart".$c."();\">".JText::_('DASHBOARD_VIEW_UPDATE_BUTTON')."</button></td>\n";
		$colspan = 6;
		if(stripos($page->dimensions, 'ga:date') !== false){
			echo "<td align=\"right\" width=\"22\"><a href=\"#day\" onclick=\"updateGAChart".$c."('day');\"><img id=\"gaday".$c."\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/day-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('DASHBOARD_VIEW_IMAGE_DATE_RANGE_DAY')."\" title=\"".JText::_('DASHBOARD_VIEW_IMAGE_DATE_RANGE_DAY')."\" /></a></td>\n";
			echo "<td align=\"right\" width=\"22\"><a href=\"#week\" onclick=\"updateGAChart".$c."('week');\"><img id=\"gaweek".$c."\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/week-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('DASHBOARD_VIEW_IMAGE_DATE_RANGE_WEEK')."\" title=\"".JText::_('DASHBOARD_VIEW_IMAGE_DATE_RANGE_WEEK')."\" /></a></td>\n";
			echo "<td align=\"right\" width=\"22\"><a href=\"#month\" onclick=\"updateGAChart".$c."('month');\"><img id=\"gamonth".$c."\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/month-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('DASHBOARD_VIEW_IMAGE_DATE_RANGE_MONTH')."\" title=\"".JText::_('DASHBOARD_VIEW_IMAGE_DATE_RANGE_MONTH')."\" /></a></td>\n";

			$colspan = 9;
		}
		echo "</tr>\n";
		if($chart != null)
		echo "<tr><td colspan=\"".$colspan."\">".$chart->getChartCode()."</td></tr>\n";
		echo "<tr><td colspan=\"".$colspan."\">".$list->getChartCode()."</td></tr>\n";
		echo "</table>\n";
		echo "<input id=\"metrics_".$c."\" value=\"".$page->metrics."\" type=\"hidden\" /></td>\n";
		echo "<input id=\"dimensions_".$c."\" value=\"".$page->dimensions."\" type=\"hidden\" /></td>\n";
		
		echo "</div>\n";
		$counter++;
	}

	$scriptCode = "jQuery(document).ready(function(){\n";
	$scriptCode .= "	window['updateGAChart'+jQuery('#tabs').tabs('option', 'selected')]();\n";
	$scriptCode .= "});\n";
	$document->addScriptDeclaration($scriptCode);
}
echo "</div>\n";

function createOption($value, $formatted, $selection){
	return "		<option value=\"".$value."\" ".($value == $selection?"selected=\"true\"":'')." />".$formatted."</option>\n";
}
?>
