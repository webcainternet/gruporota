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

echo $title;

GAnalyticsUtil::loadJQuery();
$document = &JFactory::getDocument();
$document->addScript(JURI::base().'administrator/components/com_ganalytics/libraries/jquery/ui/jquery-ui-1.8.1.custom.min.js');
$document->addScript(JURI::base().'administrator/components/com_ganalytics/libraries/jquery/ext/jquery-cookie.js');
$document->addStyleSheet(JURI::base().'administrator/components/com_ganalytics/libraries/jquery/themes/ui-lightness/jquery-ui-1.8.1.custom.css');

$list = new GAnalyticsListRenderer();
$list->enablePagination($params->get('pagination', 'yes') == 'yes');
$c = $list->getChartCounter();

$showDateSelection = $params->get('showDateSelection', 'yes') == 'yes';
if($showDateSelection) {
	$scriptCode = "jQuery(document).ready(function(){\n";
	$scriptCode .= "	jQuery(\"#mod_list_date_from_".$c."\").datepicker({\n";
	$scriptCode .= "		dateFormat: 'dd-mm-yy',\n";
	$scriptCode .= "		changeYear: true, maxDate:0, minDate: new Date(2005, 1 - 1, 1),\n";
	$scriptCode .= "		dayNames: ".GAnalyticsUtil::getDaysLong().",\n";
	$scriptCode .= "		dayNamesShort: ".GAnalyticsUtil::getDaysShort().",\n";
	$scriptCode .= "		dayNamesMin: ".GAnalyticsUtil::getDaysMin().",\n";
	$scriptCode .= "		monthNames: ".GAnalyticsUtil::getMonthsLong().",\n";
	$scriptCode .= "		monthNamesShort: ".GAnalyticsUtil::getMonthsShort()."\n";
	$scriptCode .= "	});\n";
	$scriptCode .= "	jQuery(\"#mod_list_date_to_".$c."\").datepicker({\n";
	$scriptCode .= "		dateFormat: 'dd-mm-yy',\n";
	$scriptCode .= "		changeYear: true, maxDate:0, minDate: new Date(2005, 1 - 1, 1),\n";
	$scriptCode .= "		dayNames: ".GAnalyticsUtil::getDaysLong().",\n";
	$scriptCode .= "		dayNamesShort: ".GAnalyticsUtil::getDaysShort().",\n";
	$scriptCode .= "		dayNamesMin: ".GAnalyticsUtil::getDaysMin().",\n";
	$scriptCode .= "		monthNames: ".GAnalyticsUtil::getMonthsLong().",\n";
	$scriptCode .= "		monthNamesShort: ".GAnalyticsUtil::getMonthsShort()."\n";
	$scriptCode .= "	});\n";
	$scriptCode .= "});\n";
	$document->addScriptDeclaration($scriptCode);
}

echo "<table><tr>\n";
if($showDateSelection) {
	echo "<td style=\"padding-right:20px\">".JText::_('MOD_LIST_VIEW_SELECT_DATE_FROM');
	echo " <input type=\"text\" id=\"mod_list_date_from_".$c."\" value=\"".strftime('%d-%m-%Y', $startDate)."\" onchange=\"updateGAModList".$c."();\" size=\"10\"/></td>\n";

	echo "<td style=\"padding-right:20px\">".JText::_('MOD_LIST_VIEW_SELECT_DATE_TO');
	echo " <input type=\"text\" id=\"mod_list_date_to_".$c."\" value=\"".strftime('%d-%m-%Y', $endDate)."\" onchange=\"updateGAModList".$c."();\" size=\"10\"/></td>\n";

	echo "<td style=\"padding-right:20px\"><button onclick=\"updateGAModList".$c."();\">".JText::_('MOD_CHART_VIEW_BUTTON_UPDATE')."</button></td>\n";
}
if(stripos($dimensions, 'ga:date') !== false){
	echo "<td align=\"right\" width=\"22\"><a href=\"#day\" onclick=\"updateGAModList".$c."('day');\"><img id=\"gaday\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/day-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_DAY')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_DAY')."\" /></a></td>\n";
	echo "<td align=\"right\" width=\"22\"><a href=\"#week\" onclick=\"updateGAModList".$c."('week');\"><img id=\"gaweek\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/week-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_WEEK')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_WEEK')."\" /></a></td>\n";
	echo "<td align=\"right\" width=\"22\"><a href=\"#month\" onclick=\"updateGAModList".$c."('month');\"><img id=\"gamonth\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/month-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_MONTH')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_MONTH')."\" /></a></td>\n";
}
echo "</tr></table>\n";

$scriptCode = "// <![CDATA[ \n";
$scriptCode .= "function updateGAModList".$c."(dayRange){\n";
if(stripos($dimensions, 'ga:date') !== false){
	$scriptCode .= "	var path = '".JURI::root()."administrator/components/com_ganalytics/images/dayrange/'; var onlyVisitors = dayRange != null;\n";
	$scriptCode .= "	if(dayRange == null) dayRange = window.location.hash.length > 1 ? window.location.hash.substring(1) : '';\n";
	$scriptCode .= "	if(dayRange == 'day'){\n";
	$scriptCode .= "		jQuery('#gaday').attr('src', path+'day-32.png');\n";
	$scriptCode .= "		jQuery('#gaweek').attr('src', path+'week-disabled-32.png');\n";
	$scriptCode .= "		jQuery('#gamonth').attr('src', path+'month-disabled-32.png');\n";
	$scriptCode .= "	}\n";
	$scriptCode .= "	if(dayRange == 'week'){\n";
	$scriptCode .= "		jQuery('#gaday').attr('src', path+'day-disabled-32.png');\n";
	$scriptCode .= "		jQuery('#gaweek').attr('src', path+'week-32.png');\n";
	$scriptCode .= "		jQuery('#gamonth').attr('src', path+'month-disabled-32.png');\n";
	$scriptCode .= "	}\n";
	$scriptCode .= "	if(dayRange == 'month'){\n";
	$scriptCode .= "		jQuery('#gaday').attr('src', path+'day-disabled-32.png');\n";
	$scriptCode .= "		jQuery('#gaweek').attr('src', path+'week-disabled-32.png');\n";
	$scriptCode .= "		jQuery('#gamonth').attr('src', path+'month-32.png');\n";
	$scriptCode .= "	}\n";
}
$scriptCode .= "	fetchData".$c."(".$profile->id.",\n";
$scriptCode .= "		'".$dimensions."', \n";
$scriptCode .= "		'".$metrics."', \n";
$scriptCode .= "		'".$sort."',\n";
$scriptCode .= "		'',\n";
$scriptCode .= "		'".$max."',\n";
$scriptCode .= "		".($showDateSelection?"jQuery(\"#mod_list_date_from_".$c."\").val()":strftime('\'%d-%m-%Y\'', $startDate)).",\n";
$scriptCode .= "		".($showDateSelection?"jQuery(\"#mod_list_date_to_".$c."\").val()":strftime('\'%d-%m-%Y\'', $endDate)).",dayRange);\n";
$scriptCode .= "}\n";
$scriptCode .= "// ]]>\n";
$document->addScriptDeclaration($scriptCode);

echo $list->getChartCode();

$scriptCode = "jQuery(document).ready(function(){\n";
$scriptCode .= "	updateGAModList".$c."();\n";
$scriptCode .= "});\n";
$document->addScriptDeclaration($scriptCode);
?>