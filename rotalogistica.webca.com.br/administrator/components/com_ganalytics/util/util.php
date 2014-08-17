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

class GAnalyticsUtil{

	private static $daysLong = null;
	private static $daysShort = null;
	private static $daysMin = null;
	private static $monthsLong = null;
	private static $monthsShort = null;

	public function getAnalyticsHandler($id = null) {
		$feed = new SimplePie_GAnalytics();
		$feed->enable_order_by_date(false);
		$feed->set_stupidly_fast(true);
		$feed->set_login(trim(GAnalyticsUtil::getComponentParameter('username')), trim(GAnalyticsUtil::getComponentParameter('password')));
		$session = & JFactory::getSession();
		$token = $session->get('com_ganalytics_auth_token');
		if(empty($token)){
			$token = $feed->authorize();
			if(empty($token))
			JError::raiseWarning(500, $feed->error());
			$session->set('com_ganalytics_auth_token', $token);
		}
		$feed->set_authorization($token);

		if(!empty($id)){
			$feeds = GAnalyticsDBUtil::getAccounts($id);
			$feed->set_profile_id($feeds[0]->profileID);
			$feed->put('ga_accountID', $feeds[0]->accountID);
			$feed->put('ga_accountName', $feeds[0]->accountName);
			$feed->put('ga_profileID', $feeds[0]->profileID);
			$feed->put('ga_profileName', $feeds[0]->profileName);
			$feed->put('ga_webPropertyId', $feeds[0]->webPropertyId);
			$feed->put('ga_startDate', strtotime($feeds[0]->startDate));
		}

		if(GAnalyticsUtil::isPROMode() && !empty($id)){
			GAnalyticsProUtil::configureCache($feed, JComponentHelper::getParams('com_ganalytics'), 'com_ganalytics');
		} else {
			$feed->enable_cache(false);
			$feed->set_cache_duration(0);
		}
		return $feed;
	}

	public function getComponentParameter($key, $default = null){
		$params   = JComponentHelper::getParams('com_ganalytics');
		return $params->get($key, $default);
	}

	public function convertCountryNameToISO($countryName) {
		static $countrys;
		if($countrys == null){
			$countrys = parse_ini_file(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'countrys.txt');
		}
		$upperName = strtoupper($countryName);
		if(isset($countrys[$upperName])){
			return $countrys[$upperName];
		}
		return '';
	}

	public function isPROMode() {
		return class_exists('GAnalyticsProUtil');
	}

	/**
	 * Returns the faded color for the given color.
	 *
	 * @param $color
	 * @param $percentage
	 * @return the faded color
	 */
	public function getFadedColor($color, $percentage = 85) {
		$percentage = 100 - $percentage;
		$rgbValues = array_map( 'hexDec', str_split( ltrim($color, '#'), 2 ) );

		for ($i = 0, $len = count($rgbValues); $i < $len; $i++) {
			$rgbValues[$i] = decHex( floor($rgbValues[$i] + (255 - $rgbValues[$i]) * ($percentage / 100) ) );
		}

		return implode('', $rgbValues);
	}

	/**
	 * Loads JQuery if the component parameter is set to yes.
	 */
	public function loadJQuery(){
		static $jQueryloaded;
		if($jQueryloaded == null){
			$param   = GAnalyticsUtil::getComponentParameter('loadJQuery');
			if($param == 'yes' || empty($param)){
				$document =& JFactory::getDocument();
				$document->addScript(JURI::base().'administrator/components/com_ganalytics/libraries/jquery/jquery-1.4.2.min.js');
				$document->addScriptDeclaration("jQuery.noConflict();");
			}
			$jQueryloaded = 'loaded';
		}
	}

	public function getDaysLong(){
		if(self::$daysLong == null) self::initCalendarValues();
		return self::$daysLong;
	}
	
	public function getDaysShort(){
		if(self::$daysShort == null) self::initCalendarValues();
		return self::$daysShort;
	}

	public function getDaysMin(){
		if(self::$daysMin == null) self::initCalendarValues();
		return self::$daysMin;
	}

	public function getMonthsLong(){
		if(self::$monthsLong == null) self::initCalendarValues();
		return self::$monthsLong;
	}

	public function getMonthsShort(){
		if(self::$monthsShort == null) self::initCalendarValues();
		return self::$monthsShort;
	}

	private function initCalendarValues(){
		self::$daysLong = "[";
		self::$daysShort = "[";
		self::$daysMin = "[";
		self::$monthsLong = "[";
		self::$monthsShort = "[";
		$dateObject = JFactory::getDate();
		for ($i=0; $i<7; $i++) {
			self::$daysLong .= "'".$dateObject->_dayToString($i, false)."'";
			self::$daysShort .= "'".$dateObject->_dayToString($i, true)."'";
			self::$daysMin .= "'".substr($dateObject->_dayToString($i, true), 0, 2)."'";
			if($i < 6){
				self::$daysLong .= ",";
				self::$daysShort .= ",";
				self::$daysMin .= ",";
			}
		}

		for ($i=1; $i<=12; $i++) {
			self::$monthsLong .= "'".$dateObject->_monthToString($i, false)."'";
			self::$monthsShort .= "'".$dateObject->_monthToString($i, true)."'";
			if($i < 12){
				self::$monthsLong .= ",";
				self::$monthsShort .= ",";
			}
		}
		self::$daysLong .= "]";
		self::$daysShort .= "]";
		self::$daysMin .= "]";
		self::$monthsLong .= "]";
		self::$monthsShort .= "]";
	}
}
?>