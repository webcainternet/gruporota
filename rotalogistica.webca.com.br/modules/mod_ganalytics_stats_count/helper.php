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

class ModGAnalyticsStatsCountHelper {

	function getSelectedFeeds(&$params) {
		$accountids = $params->get('accountids');
		$accountId = null;
		if(!empty($accountids)){
			if(is_array($accountids)) {
				$accountId = $accountids[0];
			} else {
				$accountId = $accountids;
			}
		}else {
			$accountids = GAnalyticsDBUtil::getAllAccounts();
			if(!empty($accountids)){
				$accountId = $accountids[0]->id;
			}
		}
		if($accountId == null){
			JError::raiseWarning( 0, 'Mod GAnalytics Stats count was unable to load data, no account was available!!');
			return null;
		}

		$feeds = array();
		$totFeed = null;
		if($params->get('selectTotalVisitors', 'yes') == 'yes'){
			$totFeed = ModGAnalyticsStatsCountHelper::createFeed($accountId, $params, 'ga:year', 'ga:visits', 1000, '');
			$totFeed->put('mod_type', 'selectTotalVisitors');
			$feeds[] = 	$totFeed;
		}
		if($params->get('selectVisitorsDay', 'yes') == 'yes'){
			$feed = $totFeed;
			if($feed == null){
				$feed = ModGAnalyticsStatsCountHelper::createFeed($accountId, $params, 'ga:year', 'ga:visits', 1000, '');
				$feeds[] = 	$feed;
			}
			$feed->put('mod_type1', 'selectVisitorsDay');
		}
		return $feeds;
	}

	function createFeed($accountId, $params, $dimensions, $metrics, $max, $sort) {
		$feed = GAnalyticsUtil::getAnalyticsHandler($accountId);
		$feed->set_start_date($feed->get('ga_startDate'));
		$feed->set_end_date(time());
		$feed->set_parameters($dimensions, $metrics, $max, $sort);
		$feed->init();
		if($feed->error()) {
			//			JError::raiseWarning( 500, 'An error occured fetching the data!! Here is the output: '.$feed->error());
		}
		return $feed;
	}
}
?>
