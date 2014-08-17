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

jimport('joomla.application.component.model');

class GAnalyticsModelStatsView extends JModel {
	
	/**
	 * Constructor that retrieves the ID from the request
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct() {
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}

	public function setId($id)	{
		// Set id and wipe data
		$this->_id		= $id;
		$this->_data	= null;
	}

	public function getStatsView() {
		// Load the data
		if (empty( $this->_data )) {
			$query = " SELECT * FROM #__ganalytics_stats WHERE id = ".$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->name = null;
			$this->_data->metrics = null;
			$this->_data->dimensions = null;
			$this->_data->sort = null;
			$this->_data->filter = null;
			$this->_data->max_result = 10;
			$this->_data->chart = null;
		}
		return $this->_data;
	}

	public function store() {
		$row =& $this->getTable();

		$data = JRequest::get( 'post' );

		if (!$row->bind($data)) {
			JError::raiseWarning( 500, $row->getError() );
			return false;
		}

		if (!$row->check()) {
			JError::raiseWarning( 500, $row->getError() );
			return false;
		}

		if (!$row->store()) {
			JError::raiseWarning( 500, $row->getError() );
			return false;
		}

		return true;
	}

	public function getProfiles() {
		if (empty( $this->profiles )) {
			$this->profiles = $this->_getList( ' SELECT * FROM #__ganalytics_profiles ' );
		}

		return $this->profiles;
	}
}
?>
