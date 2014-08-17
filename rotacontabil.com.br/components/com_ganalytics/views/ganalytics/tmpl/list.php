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

$params = $this->params;
GAnalyticsUtil::loadJQuery();
$document = &JFactory::getDocument();
$document->addScript(JURI::base().'administrator/components/com_ganalytics/libraries/jquery/ui/jquery-ui-1.8.1.custom.min.js');
$document->addScript(JURI::base().'administrator/components/com_ganalytics/libraries/jquery/ext/jquery-cookie.js');
$document->addStyleSheet(JURI::base().'administrator/components/com_ganalytics/libraries/jquery/themes/ui-lightness/jquery-ui-1.8.1.custom.css');

$showDateSelection = $params->get('showDateSelection', 'yes') == 'yes';
if($showDateSelection) {
	$scriptCode = "jQuery(document).ready(function(){\n";
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
	$scriptCode .= "});\n";
	$document->addScriptDeclaration($scriptCode);
}
foreach ($this->profiles as $profile) {
	$title = $this->titleFormat;
	$title = str_replace("{accountname}", $profile->accountName, $title);
	$title = str_replace("{profilename}", $profile->profileName, $title);
	echo $title;

	if($showDateSelection) {
		echo "<table><tr>\n";
		echo "<td style=\"padding-right:20px\">".JText::_('LIST_VIEW_SELECT_DATE_FROM');
		echo " <input type=\"text\" id=\"date_from\" value=\"".strftime('%d-%m-%Y', $this->startDate)."\" onchange=\"updateGAChart();\" size=\"10\" /></td>\n";

		echo "<td style=\"padding-right:20px\">".JText::_('LIST_VIEW_SELECT_DATE_TO');
		echo " <input type=\"text\" id=\"date_to\" value=\"".strftime('%d-%m-%Y', $this->endDate)."\" onchange=\"updateGAChart();\" size=\"10\" /></td>\n";

		echo "<td style=\"padding-right:20px\"><button onclick=\"updateGAChart();\">".JText::_('LIST_VIEW_BUTTON_UPDATE')."</button></td>\n";
		echo "</tr></table>\n";
	}
	$scriptCode = "// <![CDATA[ \n";
	$scriptCode .= "function updateGAChart(dr){\n";
	$scriptCode .= "	var path = '".JURI::root()."administrator/components/com_ganalytics/images/dayrange/';\n";
	if($params->get('showVisitors', 'yes') == 'yes'){
		$scriptCode .= "	var dayRange = dr;\n";
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

		$list = new GAnalyticsListRenderer();
		$list->enablePagination($params->get('pagination', 'yes') == 'yes');
		$scriptCode .= "	if(dr == null || dr.length < 6) fetchData".$list->getChartCounter()."(".$profile->id.",\n";
		$scriptCode .= "		'ga:date', \n";
		$scriptCode .= "		'ga:visits', \n";
		$scriptCode .= "		'ga:date',\n";
		$scriptCode .= "		'',\n";
		$scriptCode .= "		'1000',\n";
		$scriptCode .= "		".($showDateSelection?"jQuery(\"#date_from\").val()":strftime('\'%d-%m-%Y\'', $this->startDate)).",\n";
		$scriptCode .= "		".($showDateSelection?"jQuery(\"#date_to\").val()":strftime('\'%d-%m-%Y\'', $this->endDate)).",dayRange);\n";

		$metric = JText::_('ga:visits');
		echo "<fieldset><legend style=\"font-size:12px;font-weight:bold;\">".substr($metric, 0, strpos($metric, ' [ga:'))."</legend><table width=\"100%\"><tr><td></td>\n";
		echo "<td align=\"right\" width=\"22\"><a href=\"#day\" onclick=\"updateGAChart('day');\"><img id=\"gaday\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/day-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_DAY')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_DAY')."\" /></a></td>\n";
		echo "<td align=\"right\" width=\"22\"><a href=\"#week\" onclick=\"updateGAChart('week');\"><img id=\"gaweek\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/week-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_WEEK')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_WEEK')."\" /></a></td>\n";
		echo "<td align=\"right\" width=\"22\"><a href=\"#month\" onclick=\"updateGAChart('month');\"><img id=\"gamonth\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/month-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_MONTH')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_MONTH')."\" /></a></td>\n";
		echo "</tr></table>\n";
		echo $list->getChartCode();
		echo '</fieldset>';
	}

	$list = new GAnalyticsListRenderer();
	$list->enablePagination($params->get('pagination', 'yes') == 'yes');
	$scriptCode .= "	var dayRangeMain = dr;\n";
	$scriptCode .= "	if(dayRangeMain == null) dayRangeMain = window.location.hash.length > 5 ? window.location.hash.substring(5) : '';\n";
	if(stripos($this->dimensions, 'ga:date') !== false){
		$scriptCode .= "	if(dayRangeMain == 'mainday'){\n";
		$scriptCode .= "		dayRangeMain = 'day';\n";
		$scriptCode .= "		jQuery('#maingaday').attr('src', path+'day-32.png');\n";
		$scriptCode .= "		jQuery('#maingaweek').attr('src', path+'week-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#maingamonth').attr('src', path+'month-disabled-32.png');\n";
		$scriptCode .= "	}\n";
		$scriptCode .= "	if(dayRange == 'mainweek'){\n";
		$scriptCode .= "		dayRangeMain = 'week';\n";
		$scriptCode .= "		jQuery('#maingaday').attr('src', path+'day-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#maingaweek').attr('src', path+'week-32.png');\n";
		$scriptCode .= "		jQuery('#maingamonth').attr('src', path+'month-disabled-32.png');\n";
		$scriptCode .= "	}\n";
		$scriptCode .= "	if(dayRange == 'mainmonth'){\n";
		$scriptCode .= "		dayRangeMain = 'month';\n";
		$scriptCode .= "		jQuery('#maingaday').attr('src', path+'day-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#maingaweek').attr('src', path+'week-disabled-32.png');\n";
		$scriptCode .= "		jQuery('#maingamonth').attr('src', path+'month-32.png');\n";
		$scriptCode .= "	}\n";
	}
	$scriptCode .= "	if(dr == null || dr.length > 5) fetchData".$list->getChartCounter()."(".$profile->id.",\n";
	$scriptCode .= "		'".$this->dimensions."', \n";
	$scriptCode .= "		'".$this->metrics."', \n";
	$scriptCode .= "		'".$this->sort."',\n";
	$scriptCode .= "		'',\n";
	$scriptCode .= "		'".$this->max."',\n";
	$scriptCode .= "		".($showDateSelection?"jQuery(\"#date_from\").val()":strftime('\'%d-%m-%Y\'', $this->startDate)).",\n";
	$scriptCode .= "		".($showDateSelection?"jQuery(\"#date_to\").val()":strftime('\'%d-%m-%Y\'', $this->endDate)).",dayRangeMain);\n";
	$scriptCode .= "}\n";
	$scriptCode .= "// ]]>\n";
	$document->addScriptDeclaration($scriptCode);

	$dimension = JText::_($this->dimensions);
	$metric = JText::_($this->metrics);
	echo "<fieldset><legend style=\"font-size:12px;font-weight:bold;\">".substr($dimension, 0, strpos($dimension, ' [ga:')).' -- '.substr($metric, 0, strpos($metric, ' [ga:'))."</legend>\n";
	if(stripos($this->dimensions, 'ga:date') !== false){
		echo "<table width=\"100%\"><tr><td></td>\n";
		echo "<td align=\"right\" width=\"22\"><a href=\"#mainday\" onclick=\"updateGAChart('mainday');\"><img id=\"gaday\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/day-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_DAY')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_DAY')."\" /></a></td>\n";
		echo "<td align=\"right\" width=\"22\"><a href=\"#mainweek\" onclick=\"updateGAChart('mainweek');\"><img id=\"gaweek\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/week-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_WEEK')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_WEEK')."\" /></a></td>\n";
		echo "<td align=\"right\" width=\"22\"><a href=\"#mainmonth\" onclick=\"updateGAChart('mainmonth');\"><img id=\"gamonth\" src=\"".JURI::root()."administrator/components/com_ganalytics/images/dayrange/month-disabled-32.png\" width=\"20px\" height=\"20px\" alt=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_MONTH')."\" title=\"".JText::_('CHART_VIEW_IMAGE_DATE_RANGE_MONTH')."\" /></a></td>\n";
		echo "</tr></table>\n";
	}
	echo $list->getChartCode();
	echo '</fieldset>';
}

$scriptCode = "jQuery(document).ready(function(){\n";
$scriptCode .= "	updateGAChart();\n";
$scriptCode .= "});\n";
$document->addScriptDeclaration($scriptCode);
if(!GAnalyticsUtil::isProMode())
echo "<div style=\"text-align:center;margin-top:10px\" id=\"ganalytics_powered\"><a href=\"http://g4j.laoneo.net\"  target=\"_blank\">Powered by GAnalytics</a></div>\n";
?>