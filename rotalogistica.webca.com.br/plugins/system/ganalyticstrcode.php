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

jimport( 'joomla.plugin.plugin');

if(file_exists(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'dbutil.php')){
	require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ganalytics'.DS.'util'.DS.'dbutil.php');
}

class plgSystemGAnalyticstrcode extends JPlugin
{
	function plgSystemGAnalyticsTRCode(&$subject, $config)
	{
		parent::__construct($subject, $config);

		$this->_plugin = JPluginHelper::getPlugin( 'system', 'ganalyticstrcode' );
		$this->_params = new JParameter( $this->_plugin->params );
	}

	function onAfterRender()
	{
		$mainframe = &JFactory::getApplication();

		if($mainframe->isAdmin() || strpos($_SERVER["PHP_SELF"], "index.php") === false || JRequest::getVar('format','html') != 'html'){
			return;
		}
		$feed = GAnalyticsDBUtil::getAccounts($this->params->get('accountids', ''));
		if(empty($feed))
		return;


		$javascript = "<script type=\"text/javascript\">
					  var _gaq = _gaq || [];
					  _gaq.push(['_setAccount', '".$feed[0]->webPropertyId."']);
						_gaq.push(['_trackPageview']);
					  (function() {
						var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
						ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
					  })();
					</script>";

		$buffer = JResponse::getBody();
		$buffer = preg_replace ("/<\/head>/", "\n\n".$javascript."\n\n</head>", $buffer);
		JResponse::setBody($buffer);
		return true;
	}
}
?>