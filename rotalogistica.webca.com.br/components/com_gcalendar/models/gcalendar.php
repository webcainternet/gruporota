<?php
/**
 * GCalendar is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GCalendar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GCalendar.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Allon Moritz
 * @copyright 2007-2010 Allon Moritz
 * @since 2.2.0
 */

defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_gcalendar'.DS.'util.php');
require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_gcalendar'.DS.'dbutil.php');

/**
 * GCalendar Model
 *
 */
class GCalendarModelGCalendar extends JModel {

	var $cached_data = null;

	/**
	 * Returns all calendars in the database. The returned
	 * rows contain an additional attribute selected which is set
	 * to true when the specific calendar is mentioned in the
	 * parameters property calendarids.
	 *
	 * @return the calendars specified in the database
	 */
	function getDBCalendars(){
		if($this->cached_data == null){
			$params = $this->getState('parameters.menu');
			$calendarids = null;
			if($params != null){
				$calendarids=$params->get('calendarids');
				$this->cached_data = GCalendarDBUtil::getCalendars($calendarids);
			} else {
				$this->cached_data = GCalendarDBUtil::getAllCalendars();
			}
		}
		return $this->cached_data;
	}

}
