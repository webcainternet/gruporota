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

defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

class GAnalyticsViewStatsView extends JView {
	
	function display($tpl = null) {
		$statsview	=& $this->get('StatsView');
		$isNew		= ($statsview->id < 1);

		$text = $isNew ? JText::_('New') : JText::_('Edit');
		JToolBarHelper::title(JText::_('STATS_VIEW_TITLE').': <small><small>[ ' . $text.' ]</small></small>', 'generic.png' );
		JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}

		$this->assignRef('statsview', $statsview);
		$profiles = & $this->get( 'Profiles');
		$this->assignRef('profiles', $profiles);

		parent::display($tpl);
	}
}
?>