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
?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
<table class="adminlist">
	<thead>
		<tr>
			<th width="5"><?php echo JText::_('CONFIG_VIEW_COLUMN_ID') ?></th>
			<th width="20"><input type="checkbox" name="toggle" value=""
				onclick="checkAll(<?php echo count( $this->items ); ?>);" /></th>
			<th><?php echo JText::_('CONFIG_VIEW_COLUMN_NAME') ?></th>
			<th><?php echo JText::_('CONFIG_VIEW_COLUMN_METRICS') ?></th>
			<th><?php echo JText::_('CONFIG_VIEW_COLUMN_DIMENSIONS') ?></th>
			<th><?php echo JText::_('CONFIG_VIEW_COLUMN_SORT') ?></th>
			<th><?php echo JText::_('CONFIG_VIEW_COLUMN_MAX') ?></th>
		</tr>
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	{
		$row = &$this->items[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_ganalytics&controller=statsview&task=edit&cid[]='. $row->id );
		?>
	<tr class="<?php echo "row$k"; ?>">
		<td><?php echo $row->id; ?></td>
		<td><?php echo $checked; ?></td>
		<td><a href="<?php echo $link; ?>"><?php echo $row->name; ?></a></td>
		<td><?php echo JText::_($row->metrics); ?></td>
		<td><?php echo JText::_($row->dimensions); ?></td>
		<td><?php echo strpos($row->sort, '-') !== false ? '-'.JText::_(substr($row->sort, 1)):JText::_($row->sort); ?></td>
		<td><?php echo $row->max_result; ?></td>
		<td></td>
	</tr>
	<?php
	$k = 1 - $k;
	}
	?>
	<tfoot>
		<tr>
			<td colspan="10"><?php echo $this->pagination->getListFooter(); ?></td>
		</tr>
	</tfoot>
</table>
</div>

<input type="hidden" name="option" value="com_ganalytics" /> <input
	type="hidden" name="task" value="" /> <input type="hidden"
	name="boxchecked" value="0" /> <input type="hidden" name="controller"
	value="config" /></form>
