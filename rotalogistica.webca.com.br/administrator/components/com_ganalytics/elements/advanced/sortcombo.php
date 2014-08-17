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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

class JElementSortcombo extends JElement
{
	/**
	 * Element name
	 *
	 * @access	protected
	 * @var		string
	 */
	var	$_name = 'Sortcombo';

	function fetchElement($name, $value, &$node, $control_name) {
		$id = $control_name.$name;
		$document = &JFactory::getDocument();
		$document->addScript(JURI::root().'administrator/components/com_ganalytics/libraries/jquery/jquery-1.4.2.min.js');
		$document->addScriptDeclaration("jQuery.noConflict();");
		
		$scriptCode = "function updateSortCombo(){\n";
		$scriptCode .= "	jQuery('#".$id."').html('');\n";
		$scriptCode .= "	jQuery('#".$id."').append(jQuery('<option></option>').val('').html(''));\n";
		$scriptCode .= "	jQuery('#".$id."').append(jQuery('<option></option>').val(jQuery(\"#paramsdimensions :selected\").val()).html(jQuery(\"#paramsdimensions :selected\").html()));\n";
		$scriptCode .= "	jQuery('#".$id."').append(jQuery('<option></option>').val('-'+jQuery(\"#paramsdimensions :selected\").val()).html('-'+jQuery(\"#paramsdimensions :selected\").html()));\n";
		$scriptCode .= "	jQuery('#".$id."').append(jQuery('<option></option>').val(jQuery(\"#paramsmetrics :selected\").val()).html(jQuery(\"#paramsmetrics :selected\").html()));\n";
		$scriptCode .= "	jQuery('#".$id."').append(jQuery('<option></option>').val('-'+jQuery(\"#paramsmetrics :selected\").val()).html('-'+jQuery(\"#paramsmetrics :selected\").html()));\n";
		$scriptCode .= "}\n";
		$scriptCode .= "jQuery(document).ready(function(){\n";
		$scriptCode .= "	jQuery('#paramsdimensions').change(function() {\n";
		$scriptCode .= "		updateSortCombo();\n";
		$scriptCode .= "	});\n";
		$scriptCode .= "	jQuery('#paramsmetrics').change(function() {\n";
		$scriptCode .= "		updateSortCombo();\n";
		$scriptCode .= "	});\n";
		$scriptCode .= "	updateSortCombo();\n";
		$scriptCode .= "	jQuery('#".$id."').val('".$value."');\n";
		$scriptCode .= "});\n";
		$document->addScriptDeclaration($scriptCode);
		return '<select class="sortcombo" name="'.$control_name.'['.$name.']" id="'.$id.'""></select>';
	}
}
?>