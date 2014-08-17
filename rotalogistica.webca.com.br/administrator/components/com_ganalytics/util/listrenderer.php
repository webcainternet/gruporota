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

class GAnalyticsListRenderer{

	private $chartCounter = 0;
	private $pagination = 'enable';

	function __construct(){
		static $chartCounter = -1;
		$chartCounter++;
		$this->chartCounter = $chartCounter;
	}

	public function getChartCounter(){
		return $this->chartCounter;
	}
	
	public function enablePagination($enable){
		$this->pagination = $enable ? 'enable':'disable';
	}

	public function getChartCode() {
		$chartCounter = $this->chartCounter;
		$chartName = 'tablechart_'.$chartCounter;

		JHTML::_('behavior.mootools');
		$document = &JFactory::getDocument();
		$document->addScript('http://www.google.com/jsapi');

		$jsCode = "// <![CDATA[ \n";
		$jsCode .= "	google.load('visualization', '1', {'packages':['table']});\n";
		$jsCode .= "	function fetchData".$chartCounter."(gaid, dimensions, metrics, sort, filter, max, start, end, dateRange){\n";
		$jsCode .= "		jQuery('#".$chartName."_loader').show();\n";
		$jsCode .= "		var url = '".JRoute::_(JURI::base().'index.php?option=com_ganalytics&view=jsonfeed&format=raw')."&gaid='+gaid+'&dimensions='+dimensions+'&metrics='+metrics+'&sort='+sort+'&filters='+escape(filter)+'&max='+max+'&start='+start+'&end='+end+'&daterange='+dateRange;\n";
		$jsCode .= "		var query = new google.visualization.Query(url);\n";
		$jsCode .= "		query.send(handleQueryResponse".$chartCounter.");\n";
		$jsCode .= "	}\n";
		$jsCode .= "	function handleQueryResponse".$chartCounter."(response){\n";
		$jsCode .= "		if (response.isError()) {\n";
		$jsCode .= "			jQuery('#".$chartName."_loader').hide();\n";
		$jsCode .= "    		jQuery('#ganalytics_".$chartName."').html('<div style=\"background-color:#E6C0C0;color:#CC0000;padding:10px;font-weight:bold;\">".JText::_('CHART_RENDERER_QUERY_ERROR').": ' + response.getMessage() + ' ' + response.getDetailedMessage()+'</div>');\n";
		$jsCode .= "    		return;\n";
		$jsCode .= "  		}\n";
		$jsCode .= "		jQuery('#".$chartName."_loader').hide();\n";
		$jsCode .= "		var ".$chartName." = new google.visualization.Table(document.getElementById('ganalytics_".$chartName."'));\n";
		$jsCode .= "		google.visualization.events.addListener(".$chartName.", 'onmouseover', ".$chartName."MouseOver);\n";
		$jsCode .= "		google.visualization.events.addListener(".$chartName.", 'onmouseout', ".$chartName."MouseOut);\n";
		$jsCode .= "		function ".$chartName."MouseOver(e) {\n";
		$jsCode .= "			".$chartName.".setSelection([e]);\n";
		$jsCode .= "		}\n";
		$jsCode .= "		function ".$chartName."MouseOut(e) {\n";
		$jsCode .= "			".$chartName.".setSelection([{'row': null, 'column': null}]);\n";
		$jsCode .= "		}\n";
		$jsCode .= "  		var data = response.getDataTable();\n";
		$jsCode .= "  		for(var i = 0; i < response.getDataTable().getNumberOfColumns(); i++){\n";
		$jsCode .= "  			if(response.getDataTable().getColumnId(i) == 'ga:source'){\n";
		$jsCode .= "  				var formatter = new google.visualization.PatternFormat('<a href=\\\"http://{0}\\\" target=\\\"_blank\\\">{0}</a>');\n";
		$jsCode .= "  				formatter.format(data, [0]);\n";
		$jsCode .= "  			}\n";
		$jsCode .= "  			if(response.getDataTable().getColumnId(i) == 'ga:pagePath'){\n";
		$jsCode .= "  				var formatter = new google.visualization.PatternFormat('<a href=\\\"{0}\\\" target=\\\"_blank\\\">{0}</a>');\n";
		$jsCode .= "  				formatter.format(data, [0]);\n";
		$jsCode .= "  			}\n";
		$jsCode .= "  		}\n";
		$jsCode .= "		".$chartName.".draw(data, {showRowNumber: false, page: '".$this->pagination."', allowHtml: true});\n";
		$jsCode .= "	}\n";
		$jsCode .= "// ]]>\n";

		$document = &JFactory::getDocument();
		$document->addScriptDeclaration($jsCode);

		return "<div id='".$chartName."_loader' style=\"text-align: center;\"><img src=\"".JURI::root()."administrator/components/com_ganalytics/images/ajax-loader.gif\"  alt=\"loader\" /></div><div id=\"ganalytics_".$chartName."\"></div>";
	}
}
?>