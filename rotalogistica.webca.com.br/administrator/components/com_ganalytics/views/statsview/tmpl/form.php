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

$statsview = $this->statsview;
?>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
<fieldset class="adminform"><legend><?php echo JText::_('STATS_VIEW_LABEL_DETAILS') ?></legend>

<table class="admintable" width="size="70"">
	<tr>
		<td width="100%" align="right" class="key"><label for="ganalytics"> <?php echo JText::_('STATS_VIEW_LABEL_NAME') ?>:
		</label></td>
		<td><input class="text_area" type="text" name="name" id="name"
			size="70" maxlength="250" value="<?php echo $statsview->name;?>" /></td>
		<td></td>
	</tr>
	<tr>
		<td width="100%" align="right" class="key"><label for="ganalytics"> <?php echo JText::_('STATS_VIEW_LABEL_DIMENSIONS') ?>:
		</label></td>
		<td><?php echo createDimensionsCombo($statsview->dimensions);?></td>
		<td><?php echo JText::_('STATS_VIEW_HELP_DIMENSIONS') ?></td>
	</tr>
	<tr>
		<td width="100%" align="right" class="key"><label for="ganalytics"> <?php echo JText::_('STATS_VIEW_LABEL_METRICS') ?>:
		</label></td>
		<td><?php echo createMetricsCombo($statsview->metrics);?></td>
		<td><?php echo JText::_('STATS_VIEW_HELP_METRICS') ?></td>
	</tr>
	<tr>
		<td width="100%" align="right" class="key"><label for="ganalytics"> <?php echo JText::_('STATS_VIEW_LABEL_SORT') ?>:
		</label></td>
		<td><select id="sort" name="sort" onchange="updateGAChart();" style="width:300px"></select></td>
		<td><?php echo JText::_('STATS_VIEW_HELP_SORT') ?></td>
	</tr>
	<tr>
		<td width="100%" align="right" class="key"><label for="ganalytics"> <?php echo JText::_('STATS_VIEW_LABEL_MAX') ?>:
		</label></td>
		<td><input class="text_area" type="text" name="max_result"
			onchange="updateGAChart();" id="max_result" size="70"
			value="<?php echo $statsview->max_result;?>" /></td>
		<td></td>
	</tr>
</table>
</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_ganalytics" /> <input
	type="hidden" name="id" value="<?php echo $statsview->id; ?>" /> <input
	type="hidden" name="task" value="" /> <input type="hidden"
	name="controller" value="statsview" /></form>
<div id="preview"><?php 
if(empty($this->profiles)){
	echo JText::_('STATS_VIEW_NO_PROFILES');
} else {
	echo "<fieldset class=\"adminform\"><legend>\n";
	echo sprintf(JText::_('STATS_VIEW_LABEL_PREVIEW'), $this->profiles[0]->profileName)."</legend>\n";
	$document = &JFactory::getDocument();
	$document->addScript(JURI::base().'components/com_ganalytics/libraries/jquery/jquery-1.4.2.min.js');
	$document->addScript(JURI::base().'components/com_ganalytics/libraries/jquery/ui/jquery-ui-1.8.1.custom.min.js');
	$document->addStyleSheet(JURI::base().'components/com_ganalytics/libraries/jquery/themes/ui-lightness/jquery-ui-1.8.1.custom.css');
	$document->addScriptDeclaration("jQuery.noConflict();");

	$chart = null;

	$scriptCode = "function updateGAChart(){\n";
	if(GAnalyticsUtil::isPROMode()){
		$chart = new GAnalyticsChartRenderer();
		$scriptCode .= "	fetchChartData".$chart->getChartCounter()."(".$this->profiles[0]->id.",\n";
		$scriptCode .= "		jQuery(\"#dimensions\").val(), \n";
		$scriptCode .= "		jQuery(\"#metrics\").val(), \n";
		$scriptCode .= "		jQuery(\"#sort\").val(),\n";
		$scriptCode .= "		'',\n";
		$scriptCode .= "		jQuery(\"#max_result\").val(),\n";
		$scriptCode .= "		'".strftime('%d-%m-%Y', strtotime('-1 month'))."',\n";
		$scriptCode .= "		'".strftime('%d-%m-%Y', time())."','');\n";
	} else {
		$chart = new GAnalyticsListRenderer();
		$scriptCode .= "	fetchData".$chart->getChartCounter()."(".$this->profiles[0]->id.",\n";
		$scriptCode .= "		jQuery(\"#dimensions\").val(), \n";
		$scriptCode .= "		jQuery(\"#metrics\").val(), \n";
		$scriptCode .= "		jQuery(\"#sort\").val(),\n";
		$scriptCode .= "		'',\n";
		$scriptCode .= "		jQuery(\"#max_result\").val(),\n";
		$scriptCode .= "		'".strftime('%d-%m-%Y', strtotime('-1 month'))."',\n";
		$scriptCode .= "		'".strftime('%d-%m-%Y', time())."','');\n";
	}
	$scriptCode .= "}\n";
	$scriptCode .= "function updateSortCombo(){\n";
	$scriptCode .= "	jQuery('#sort').html('');\n";
	$scriptCode .= "	jQuery('#sort').append(jQuery('<option></option>').val('').html(''));\n";
	$scriptCode .= "	jQuery('#sort').append(jQuery('<option></option>').val(jQuery(\"#dimensions :selected\").val()).html(jQuery(\"#dimensions :selected\").html()));\n";
	$scriptCode .= "	jQuery('#sort').append(jQuery('<option></option>').val('-'+jQuery(\"#dimensions :selected\").val()).html('-'+jQuery(\"#dimensions :selected\").html()));\n";
	$scriptCode .= "	jQuery('#sort').append(jQuery('<option></option>').val(jQuery(\"#metrics :selected\").val()).html(jQuery(\"#metrics :selected\").html()));\n";
	$scriptCode .= "	jQuery('#sort').append(jQuery('<option></option>').val('-'+jQuery(\"#metrics :selected\").val()).html('-'+jQuery(\"#metrics :selected\").html()));\n";
	$scriptCode .= "}\n";
	$scriptCode .= "jQuery(document).ready(function(){\n";
	$scriptCode .= "	updateSortCombo();updateGAChart();\n";
	$scriptCode .= "});\n";
	$document->addScriptDeclaration($scriptCode);

	echo $chart->getChartCode()."</fieldset>\n";
}
?></div>

<?php
function createDimensionsCombo($selection = null) {
	$options = array(
		'ga:browser' => JText::_('ga:browser'),
		'ga:browserVersion' => JText::_('ga:browserVersion'),
		'ga:city' => JText::_('ga:city'),
		'ga:connectionSpeed' => JText::_('ga:connectionSpeed'),
		'ga:continent' => JText::_('ga:continent'),
		'ga:countOfVisits' => JText::_('ga:countOfVisits'),
		'ga:country' => JText::_('ga:country'),
		'ga:date' => JText::_('ga:date'),
		'ga:day' => JText::_('ga:day'),
		'ga:daysSinceLastVisit' => JText::_('ga:daysSinceLastVisit'),
		'ga:flashVersion' => JText::_('ga:flashVersion'),
		'ga:hostname' => JText::_('ga:hostname'),
		'ga:hour' => JText::_('ga:hour'),
		'ga:javaEnabled' => JText::_('ga:javaEnabled'),
		'ga:language' => JText::_('ga:language'),
		'ga:latitude' => JText::_('ga:latitude'),
		'ga:longitude' => JText::_('ga:longitude'),
		'ga:month' => JText::_('ga:month'),
		'ga:networkDomain' => JText::_('ga:networkDomain'),
		'ga:networkLocation' => JText::_('ga:networkLocation'),
		'ga:pageDepth' => JText::_('ga:pageDepth'),
		'ga:operatingSystem' => JText::_('ga:operatingSystem'),
		'ga:operatingSystemVersion' => JText::_('ga:operatingSystemVersion'),
		'ga:region' => JText::_('ga:region'),
		'ga:screenColors' => JText::_('ga:screenColors'),
		'ga:screenResolution' => JText::_('ga:screenResolution'),
		'ga:subContinent' => JText::_('ga:subContinent'),
		'ga:userDefinedValue' => JText::_('ga:userDefinedValue'),
		'ga:visitorType' => JText::_('ga:visitorType'),
		'ga:week' => JText::_('ga:week'),
		'ga:year' => JText::_('ga:year'),
		'ga:adContent' => JText::_('ga:adContent'),
		'ga:adGroup' => JText::_('ga:adGroup'),
		'ga:adSlot' => JText::_('ga:adSlot'),
		'ga:adSlotPosition' => JText::_('ga:adSlotPosition'),
		'ga:campaign' => JText::_('ga:campaign'),
		'ga:keyword' => JText::_('ga:keyword'),
		'ga:medium' => JText::_('ga:medium'),
		'ga:referralPath' => JText::_('ga:referralPath'),
		'ga:source' => JText::_('ga:source'),
		'ga:exitPagePath' => JText::_('ga:exitPagePath'),
		'ga:landingPagePath' => JText::_('ga:landingPagePath'),
		'ga:pagePath' => JText::_('ga:pagePath'),
		'ga:pageTitle' => JText::_('ga:pageTitle'),
		'ga:affiliation' => JText::_('ga:affiliation'),
		'ga:daysToTransaction' => JText::_('ga:daysToTransaction'),
		'ga:productCategory' => JText::_('ga:productCategory'),
		'ga:productName' => JText::_('ga:productName'),
		'ga:productSku' => JText::_('ga:productSku'),
		'ga:transactionId' => JText::_('ga:transactionId'),
		'ga:searchCategory' => JText::_('ga:searchCategory'),
		'ga:searchDestinationPage' => JText::_('ga:searchDestinationPage'),
		'ga:searchKeyword' => JText::_('ga:searchKeyword'),
		'ga:searchKeywordRefinement' => JText::_('ga:searchKeywordRefinement'),
		'ga:searchStartPage' => JText::_('ga:searchStartPage'),
		'ga:searchUsed' => JText::_('ga:searchUsed'));
	return createSelectionStatement($options, $selection, 'dimensions');
}

function createMetricsCombo($selection = null){
	$options = array(
		'ga:bounces' => JText::_('ga:bounces'),
		'ga:entrances' => JText::_('ga:entrances'),
		'ga:exits' => JText::_('ga:exits'),
		'ga:newVisits' => JText::_('ga:newVisits'),
		'ga:pageviews' => JText::_('ga:pageviews'),
		'ga:timeOnPage' => JText::_('ga:timeOnPage'),
		'ga:timeOnSite' => JText::_('ga:timeOnSite'),
		'ga:visitors' => JText::_('ga:visitors'),
		'ga:visits' => JText::_('ga:visits'),
		'ga:adClicks' => JText::_('ga:adClicks'),
		'ga:adCost' => JText::_('ga:adCost'),
		'ga:CPC' => JText::_('ga:CPC'),
		'ga:CPM' => JText::_('ga:CPM'),
		'ga:CTR' => JText::_('ga:CTR'),
		'ga:impressions' => JText::_('ga:impressions'),
		'ga:uniquePageviews' => JText::_('ga:uniquePageviews'),
		'ga:itemRevenue' => JText::_('ga:itemRevenue'),
		'ga:itemQuantity' => JText::_('ga:itemQuantity'),
		'ga:transactionRevenue' => JText::_('ga:transactionRevenue'),
		'ga:transactions' => JText::_('ga:transactions'),
		'ga:transactionShipping' => JText::_('ga:transactionShipping'),
		'ga:transactionTax' => JText::_('ga:transactionTax'),
		'ga:uniquePurchases' => JText::_('ga:uniquePurchases'),
		'ga:searchDepth' => JText::_('ga:searchDepth'),
		'ga:searchDuration' => JText::_('ga:searchDuration'),
		'ga:searchExits' => JText::_('ga:searchExits'),
		'ga:searchRefinements' => JText::_('ga:searchRefinements'),
		'ga:searchUniques' => JText::_('ga:searchUniques'),
		'ga:searchVisits' => JText::_('ga:searchVisits'),
		'ga:goal1Completions' => JText::_('ga:goal1Completions'),
		'ga:goal2Completions' => JText::_('ga:goal2Completions'),
		'ga:goal3Completions' => JText::_('ga:goal3Completions'),
		'ga:goal4Completions' => JText::_('ga:goal4Completions'),
		'ga:goalCompletionsAll' => JText::_('ga:goalCompletionsAll'),
		'ga:goal1Starts' => JText::_('ga:goal1Starts'),
		'ga:goal2Starts' => JText::_('ga:goal2Starts'),
		'ga:goal3Starts' => JText::_('ga:goal3Starts'),
		'ga:goal4Starts' => JText::_('ga:goal4Starts'),
		'ga:goalStartsAll' => JText::_('ga:goalStartsAll'),
		'ga:goal1Value' => JText::_('ga:goal1Value'),
		'ga:goal2Value' => JText::_('ga:goal2Value'),
		'ga:goal3Value' => JText::_('ga:goal3Value'),
		'ga:goal4Value' => JText::_('ga:goal4Value'),
		'ga:goalValueAll' => JText::_('ga:goalValueAll')
	);

	return createSelectionStatement($options, $selection, 'metrics');
}

function createSelectionStatement($options, $selection, $id) {
	$code = "<select id=\"".$id."\" name=\"".$id."\" style=\"width:300px\"  onchange=\"updateSortCombo();updateGAChart();\">\n";
	foreach ($options as $key => $value) {
		$selected = '';
		if($key == $selection)
		$selected = "selected=\"true\"";
		$code .=  "<option ".$selected." value=\"".$key."\">".$value."</option>\n";
	}
	$code .= "</select>\n";
	return $code;
}
?>