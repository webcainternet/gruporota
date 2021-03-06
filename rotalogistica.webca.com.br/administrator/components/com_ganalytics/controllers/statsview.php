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

/**
 *
 */
class GAnalyticsControllerStatsView extends GAnalyticsController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
	}

	/**
	 * display the edit form
	 * @return void
	 */
	function edit()
	{
		JRequest::setVar( 'view', 'StatsView' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('StatsView');

		if ($model->store()) {
			$msg = JText::_( 'STATS_VIEW_CONTROLLER_SAVE_SUCCESS' );
		} else {
			$msg = JText::_( 'STATS_VIEW_CONTROLLER_SAVE_ERROR' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_ganalytics&view=config';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('StatsView');
		if(!$model->delete()) {
			$msg = JText::_( 'STATS_VIEW_CONTROLLER_DELETE_ERROR' );
		} else {
			$msg = JText::_( 'STATS_VIEW_CONTROLLER_DELETE_SUCCESS' );
		}

		$this->setRedirect( 'index.php?option=com_ganalytics&view=config', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'STATS_VIEW_CONTROLLER_SAVE_ABORT' );
		$this->setRedirect( 'index.php?option=com_ganalytics&view=config', $msg );
	}
}
?>
