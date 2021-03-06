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

defined('_JEXEC') or die('Restricted access'); ?>

<form action="index.php" method="post" name="adminForm">
<div id="editcell">
<table class="adminlist">
	<thead>
		<tr>
			<th width="20"><input type="checkbox" name="toggle" value=""
				onclick="checkAll(<?php echo count( $this->online_items ); ?>);" /></th>
			<th><?php echo JText::_('IMPORT_VIEW_COLUMN_ACCOUNT_NAME') ?></th>
			<th><?php echo JText::_('IMPORT_VIEW_COLUMN_PROFILE_NAME') ?></th>
			<th><?php echo JText::_('IMPORT_VIEW_COLUMN_ACCOUNT_ID') ?></th>
			<th><?php echo JText::_('IMPORT_VIEW_COLUMN_PROFILE_ID') ?></th>
			<th><?php echo JText::_('IMPORT_VIEW_COLUMN_WEB_PROFILE_ID') ?></th>
		</tr>
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->online_items ); $i < $n; $i++)	{
		$row = &$this->online_items[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->accountID.','.$row->profileID.','.$row->webPropertyId.','.$row->accountName.','.$row->profileName);
		?>
	<tr class="<?php echo "row$k"; ?>">
		<td><?php echo $checked; ?></td>
		<td><?php echo $row->accountName; ?></td>
		<td><?php echo $row->profileName; ?></td>
		<td><?php echo $row->accountID; ?></td>
		<td><?php echo $row->profileID; ?></td>
		<td><?php echo $row->webPropertyId; ?></td>
	</tr>
	<?php
	$k = 1 - $k;
	}
	?>
</table>
</div>

<input type="hidden" name="option" value="com_ganalytics" /> <input
	type="hidden" name="task" value="" /> <input type="hidden"
	name="boxchecked" value="0" /> <input type="hidden" name="controller"
	value="import" /></form>
