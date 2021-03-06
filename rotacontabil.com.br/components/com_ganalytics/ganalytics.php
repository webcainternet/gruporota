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

require_once(JPATH_COMPONENT.DS.'controller.php');
require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'util.php');
require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'dbutil.php');
require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'listrenderer.php');
if (file_exists(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'proutil.php')) {
	require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'proutil.php');
}
if (file_exists(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'chartrenderer.php')) {
	require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'chartrenderer.php');
}
jimport('simplepie.simplepie');
require_once( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'libraries'.DS.'sp-ganalytics'.DS.'simplepie-ganalytics.php' );

if($controller = JRequest::getCmd('controller')) {
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}

$classname	= 'GAnalyticsController'.$controller;
$controller = new $classname();

// Perform the Request task
$controller->execute( JRequest::getVar('task'));
//
//// Redirect if set by the controller
$controller->redirect();
?>
