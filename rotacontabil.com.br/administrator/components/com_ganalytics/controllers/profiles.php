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

class GAnalyticsControllerProfiles extends GAnalyticsController
{
	function __construct()
	{
		parent::__construct();
	}

	function remove()
	{
		$model = $this->getModel('profiles');
		if(!$model->delete()) {
			$msg = JText::_( 'PROFILES_VIEW_CONTROLLER_DELETE_ERROR' );
		} else {
			$msg = JText::_( 'PROFILES_VIEW_CONTROLLER_DELETE_SUCCESS' );
		}
		$this->setRedirect( 'index.php?option=com_ganalytics&view=profiles', $msg );
	}
}