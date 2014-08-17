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

if($feeds == null) return;

$output = "<table>\n";
foreach ($feeds as $feed) {
	if($feed->get('mod_type') == 'selectTotalVisitors'){
		$data = $feed->get_items();
		$sum = 0;
		foreach ($data as $row) {
			$sum += $row->get_metric('ga:visits');
		}
		$output .=  "<tr><td>".JText::_('TOTAL_VISITORS').":</td><td>".$sum."</td></tr>\n";
	}
	if($feed->get('mod_type1') == 'selectVisitorsDay'){
		$data = $feed->get_items();
		$sum = 0;
		foreach ($data as $row) {
			$sum += $row->get_metric('ga:visits');
		}
		$days = (time() - $feed->get('ga_startDate')) / 86400; // millisecs in day
		if($days == 0)$days = 1;
		$output .=  "<tr><td>".JText::_('VISITORS_A_DAY').":</td><td align=\"right\">".ceil($sum / $days)."</td></tr>\n";
	}
}
$output .= "</table>\n";
echo $output;
?>
