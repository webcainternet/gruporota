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

class GAnalyticsChartRenderer{

	private $chartCounter = 0;
	private $color = 'EB8F33';
	private $showChartSelection = true;

	public function __construct(){
		static $chartCounter = -1;
		$chartCounter++;
		$this->chartCounter = $chartCounter;
	}

	public function getChartCounter(){
		return $this->chartCounter;
	}

	public function setColor($color = 'EB8F33'){
		$this->color = $color;
	}

	public function setShowChartSelection($showChartSelection = true){
		$this->showChartSelection = $showChartSelection;
	}

	public function getChartCode() {
		$chartCounter = $this->chartCounter;
		$chartName = 'imagechart_'.$chartCounter;

		JHTML::_('behavior.mootools');
		$document = &JFactory::getDocument();
		$document->addScript('http://www.google.com/jsapi');

		$jsCode = "// <![CDATA[ \n";
		$jsCode .= "	google.load('visualization', '1', {'packages':['BarChart', 'GeoMap', 'LineChart', 'PieChart', 'AreaChart', 'ColumnChart']});\n";
		$jsCode .= "	var ".$chartName."_data = null;\n";
		$jsCode .= "	function fetchChartData".$chartCounter."(gaid, dimensions, metrics, sort, filter, max, start, end, dateRange){\n";
		$jsCode .= "		jQuery('#".$chartName."_loader').show();\n";
		$jsCode .= "		var url = '".JRoute::_(JURI::base().'index.php?option=com_ganalytics&view=jsonfeed&format=raw')."&gaid='+gaid+'&dimensions='+dimensions+'&metrics='+metrics+'&sort='+sort+'&filters='+escape(filter)+'&max='+max+'&start='+start+'&end='+end+'&daterange='+dateRange;\n";
		$jsCode .= "		var query = new google.visualization.Query(url);\n";
		$jsCode .= "		query.send(handleQueryChartResponse".$chartCounter.");\n";
		$jsCode .= "	}\n";
		$jsCode .= "	function handleQueryChartResponse".$chartCounter."(response){\n";
		$jsCode .= "		var gaChart = jQuery('#ganalytics_".$chartName."');\n";
		$jsCode .= "		if (response.isError()) {\n";
		$jsCode .= "			jQuery('#".$chartName."_loader').hide();\n";
		$jsCode .= "    		gaChart.html('<div style=\"background-color:#E6C0C0;color:#CC0000;padding:10px;font-weight:bold;\">".JText::_('CHART_RENDERER_QUERY_ERROR').": ' + response.getMessage() + ' ' + response.getDetailedMessage()+'</div>');\n";
		$jsCode .= "    		return;\n";
		$jsCode .= "  		}\n";
		$jsCode .= "  		var props = {legend:'none', width: gaChart.width(), height: gaChart.height(), fontSize: '12'}; var ".$chartName." = null;\n";
		$jsCode .= "  		for(var i = 0; i < response.getDataTable().getNumberOfColumns(); i++){\n";
		$jsCode .= "  			if(response.getDataTable().getColumnId(i) == 'ga:date'){\n";
		$jsCode .= "  				".$chartName." = new google.visualization.LineChart(gaChart[0]);\n";
		//$jsCode .= "  				props['legend'] = 'none';\n";
		$jsCode .= "  				props['colors'] = ['#".$this->color."'];\n";
		$jsCode .= "  				break;\n";
		$jsCode .= "  			}\n";
		$jsCode .= "  			if(response.getDataTable().getColumnId(i) == 'ga:country'){\n";
		$jsCode .= "  				".$chartName." = new google.visualization.GeoMap(gaChart[0]);\n";
		$jsCode .= "  				props['dataMode'] = 'regions';\n";
		$jsCode .= "  				props['colors'] = ['0x".GAnalyticsUtil::getFadedColor($this->color, 20)."', '0x".$this->color."'];\n";
		$jsCode .= "  				break;\n";
		$jsCode .= "  			}\n";
		//		$jsCode .= "  			if(response.getDataTable().getColumnId(i) == 'ga:city'){\n";
		//		$jsCode .= "  				".$chartName." = new google.visualization.GeoMap(gaChart[0]);\n";
		//		$jsCode .= "  				props['dataMode'] = 'markers';\n";
		//		$jsCode .= "  				props['colors'] = ['0x".GAnalyticsUtil::getFadedColor($this->color, 20)."', '0x".$this->color."'];\n";
		//		$jsCode .= "  				break;\n";
		//		$jsCode .= "  			}\n";
		$jsCode .= "  		}\n";

		$jsCode .= "  		if(".$chartName." == null){\n";
		$jsCode .= "  			".$chartName." = new google.visualization.BarChart(gaChart[0]);\n";
		$jsCode .= "  			props['colors'] = ['#".$this->color."'];\n";
		$jsCode .= "  		}\n";
		$jsCode .= "		google.visualization.events.addListener(".$chartName.", 'onmouseover', ".$chartName."MouseOver);\n";
		$jsCode .= "		google.visualization.events.addListener(".$chartName.", 'onmouseout', ".$chartName."MouseOut);\n";
		$jsCode .= "		function ".$chartName."MouseOver(e) {\n";
		$jsCode .= "			".$chartName.".setSelection([e]);\n";
		$jsCode .= "		}\n";
		$jsCode .= "		function ".$chartName."MouseOut(e) {\n";
		$jsCode .= "			".$chartName.".setSelection([{'row': null, 'column': null}]);\n";
		$jsCode .= "		}\n";
		//		$jsCode .= "    	function ".$chartName."Select() {\n";
		//		$jsCode .= "            var s = ".$chartName.".getSelection()[0];\n";
		//		$jsCode .= "  			for(var i = 0; i < response.getDataTable().getNumberOfColumns(); i++){\n";
		//		$jsCode .= "  				if(response.getDataTable().getColumnId(i) == 'ga:source'){\n";
		//		$jsCode .= "            		var w = 400;\n";
		//		$jsCode .= "            		var h = 300;\n";
		//		$jsCode .= "            		var left = (screen.width/2)-(w/2);\n";
		//		$jsCode .= "            		var top = (screen.height/2)-(h/2);alert(response.getDataTable().getFormattedValue(s.row, 0));\n";
		//		$jsCode .= "            		window.open('http://'+response.getDataTable().getFormattedValue(s.row, 0)).focus();\n";
		//		$jsCode .= "  				}\n";
		//		$jsCode .= "  			}\n";
		//		$jsCode .= "   		 }\n";
		$jsCode .= "		jQuery('#".$chartName."_loader').hide();\n";
		$jsCode .= "		".$chartName."_data = response.getDataTable();\n";
		$jsCode .= "		".$chartName.".draw(response.getDataTable(), props);\n";
		$jsCode .= "	}\n";
		if($this->showChartSelection){
			$jsCode .= "	function showChart".$chartCounter."(chart){\n";
			$jsCode .= "		google.visualization.events.addListener(chart, 'onmouseover', ".$chartName."MouseOver);\n";
			$jsCode .= "		google.visualization.events.addListener(chart, 'onmouseout', ".$chartName."MouseOut);\n";
			$jsCode .= "		function ".$chartName."MouseOver(e) {\n";
			$jsCode .= "			chart.setSelection([e]);\n";
			$jsCode .= "		}\n";
			$jsCode .= "		function ".$chartName."MouseOut(e) {\n";
			$jsCode .= "			chart.setSelection([{'row': null, 'column': null}]);\n";
			$jsCode .= "		}\n";
			$jsCode .= "		var gaChart = jQuery('#ganalytics_".$chartName."');\n";
			$jsCode .= "  		var props = {legend:'none', width: gaChart.width(), height: gaChart.height(), fontSize: '12'};\n";
			$jsCode .= "		if(!(chart instanceof google.visualization.PieChart))\n";
			$jsCode .= "  			props['colors'] = ['#".$this->color."'];\n";
			$jsCode .= "		chart.draw(".$chartName."_data, props);\n";
			$jsCode .= "	}\n";
		}
		$jsCode .= "// ]]>\n";

		$document = &JFactory::getDocument();
		$document->addScriptDeclaration($jsCode);

		$buffer = '';
		if($this->showChartSelection){
			$buffer = "<table width=\"100%\"><tr><td rowspan=\"7\">\n";
		}
		$buffer .= "<div id='".$chartName."_loader' style=\"text-align: center;\"><img src=\"".JURI::root() . "administrator/components/com_ganalytics/images/ajax-loader.gif\"  alt=\"loader\" /></div>\n";
		$buffer .= "<div id=\"ganalytics_".$chartName."\" style=\"height: 300px\" ></div>\n";
		if($this->showChartSelection){
			$buffer .= "</td></tr>";
			$buffer .= "<tr><td width=\"42px\" height=\"27px\"><img onclick=\"showChart".$chartCounter."(new google.visualization.LineChart(jQuery('#ganalytics_".$chartName."')[0]));\" src=\"".JURI::root() . "administrator/components/com_ganalytics/images/charts/icon-linechart.png\"  alt=\"".JText::_('CHART_RENDERER_IMAGE_LINECHART')."\" title=\"".JText::_('CHART_RENDERER_IMAGE_LINECHART')."\" width=\"40px\" height=\"25px\" style=\"cursor:pointer;\"/></td></tr>\n";
			$buffer .= "<tr><td width=\"42px\" height=\"25px\"><img onclick=\"showChart".$chartCounter."(new google.visualization.AreaChart(jQuery('#ganalytics_".$chartName."')[0]));\" src=\"".JURI::root() . "administrator/components/com_ganalytics/images/charts/icon-areachart.png\"  alt=\"".JText::_('CHART_RENDERER_IMAGE_AREACHART')."\" title=\"".JText::_('CHART_RENDERER_IMAGE_AREACHART')."\" width=\"40px\" height=\"23px\" style=\"cursor:pointer;\"/></td></tr>\n";
			$buffer .= "<tr><td width=\"42px\" height=\"27px\"><img onclick=\"showChart".$chartCounter."(new google.visualization.BarChart(jQuery('#ganalytics_".$chartName."')[0]));\" src=\"".JURI::root() . "administrator/components/com_ganalytics/images/charts/icon-barchart.png\"  alt=\"".JText::_('CHART_RENDERER_IMAGE_BARCHART')."\" title=\"".JText::_('CHART_RENDERER_IMAGE_BARCHART')."\" width=\"40px\" height=\"25px\" style=\"cursor:pointer;\"/></td></tr>\n";
			$buffer .= "<tr><td width=\"42px\" height=\"27px\"><img onclick=\"showChart".$chartCounter."(new google.visualization.ColumnChart(jQuery('#ganalytics_".$chartName."')[0]));\" src=\"".JURI::root() . "administrator/components/com_ganalytics/images/charts/icon-columnchart.png\"  alt=\"".JText::_('CHART_RENDERER_IMAGE_COLUMNCHART')."\" title=\"".JText::_('CHART_RENDERER_IMAGE_COLUMNCHART')."\" width=\"40px\" height=\"25px\" style=\"cursor:pointer;\"/></td></tr>\n";
			$buffer .= "<tr><td width=\"42px\" height=\"30px\"><img onclick=\"showChart".$chartCounter."(new google.visualization.PieChart(jQuery('#ganalytics_".$chartName."')[0]));\" src=\"".JURI::root() . "administrator/components/com_ganalytics/images/charts/icon-piechart.png\"  alt=\"".JText::_('CHART_RENDERER_IMAGE_PIECHART')."\" title=\"".JText::_('CHART_RENDERER_IMAGE_PIECHART')."\" width=\"40px\" height=\"28px\" style=\"cursor:pointer;\"/></td></tr>\n";
			$buffer .= "<tr><td></td></tr></table>\n";
		}
		return $buffer;
	}
}
?>