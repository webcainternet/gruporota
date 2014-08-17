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
?>

<table class="adminlist">
	<thead>
		<tr>
			<th>Status</th>
			<th width="40">Name</th>
			<th>Description</th>
			<th>Solution</th>
		</tr>
	</thead>
	<?php
	$data = array();
	$data[] = checkRemoteConnection();
	$data[] = checkPhpVersion();
	$data[] = checkCache();
	$data[] = checkPROMode();
	$tmp = checkDB();
	$data = array_merge($data, $tmp);
	foreach ($data as $test) {
		echo "<tr>\n";
		$img = "components/com_ganalytics/views/tools/tmpl/ok.png";
		if($test['status']=="failure")
		$img = "components/com_ganalytics/views/tools/tmpl/failure.png";
		else if($test['status']=="warning")
		$img = "components/com_ganalytics/views/tools/tmpl/warning.png";
		echo "<td width=\"17\" align=\"center\"><img src=\"".$img."\" width=\"16\" height=\"16\"/></td>\n";
		echo "<td width=\"120\">".$test['name']."</td><td>".$test['description']."</td><td>".$test['solution']."</td>";
		echo "</tr>\n";
	}
	?>
</table>

	<?php
	function checkDB() {
		$tmp = array();
		$results = GAnalyticsDBUtil::getAllAccounts();
		if(empty($results)){
			$tmp[] = array('name'=>'DB Entries Check', 'description'=>'No profiles found.', 'status'=>'warning', 'solution'=>'Import your google analytics profiles.');
		}else{
			foreach ($results as $result) {
				$feed = GAnalyticsUtil::getAnalyticsHandler($result->id);
				$feed->set_end_date(time());
				$feed->set_start_date(strtotime('- 1 month'));
				$feed->set_parameters('ga:date', 'ga:visits', 100, '', '');
				$feed->init();
				$data = $feed->get_items();

				if ($feed->error()){
					$desc = "The following Simplepie error occurred when reading statistic data from profile ".$result->profileName.":<br>".$feed->error();
					$solution = "<ul><li>If the error is the same as in the connection test use the solution described there.</li>";
					$solution .= "<li>Check if the username and password are correct in the component parameters.</li>";
					$solution .= "<li><b>If the problem still exists check the forum at <a href=\"http://g4j.laoneo.net\">g4j.laoneo.net</a>.</b></li>";
					$status = 'failure';
				}else{
					$solution = '';
					$status = 'ok';
					$desc = 'Simplepie could read the statistic data without any problems from profile '.$result->profileName.'.';
				}
				$desc .= '<br><a href="'.$feed->feed_url.'" target="_blank">Here</a> is the url of the generated google analytics feed.';
				$tmp[] = array('name'=>$result->profileName.' Check', 'description'=>$desc, 'status'=>$status, 'solution'=>$solution);
			}
		}
		return $tmp;
	}


	function checkRemoteConnection(){
		$desc = '';
		$solution = '';
		$status = 'ok';
		if (function_exists('curl_exec')){
			$ch=curl_init();
			curl_setopt ($ch, CURLOPT_URL,'www.google.com');
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch,CURLOPT_VERBOSE,false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			$page=curl_exec($ch);
			// $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if(curl_errno($ch)){
				$desc = 'Curl could not retrieve remote content from www.google.com. The following error occured:'.curl_error($ch);
				$solution = 'Please contact your web hoster and check if their firewall blocks curl http calls to google.com.';
				$status = 'failure';
			}else{
				$desc = 'Curl could sucessfully retrieve remote content from www.google.com.';
			}
			curl_close($ch);
		}else{
			$fp = fsockopen("www.google.com", 80, $errno, $errstr, 5);
			if (!$fp) {
				$desc = 'A connection to www.google.com could not be established. The following error occured:'.$errstr.' ('.$errno.')';
				$solution = 'Please contact your web hoster and check if their firewall blocks http calls to google.com.';
				$status = 'failure';
			} else {
				$desc = 'A connection to www.google.com could successfully be established.';
			}
		}
		return array('name'=>'Google Connection Check', 'description'=>$desc, 'status'=>$status, 'solution'=>$solution);
	}

	function checkPhpVersion(){
		$desc = "Your PHP version is ".phpversion().". This is enough to use GAnalytics.";
		$status = 'ok';
		$solution = '';
		if(phpversion() < '5.0.0') {
			$desc = "Your PHP version is ".phpversion().". This is not enough to use GAnalytics.";
			$status = 'failure';
			$solution = 'Contact your web hoster and check if it possible to upgrade your php version to 5.0.0 or above.';
		}
		return array('name'=>'PHP Version Check', 'description'=>$desc, 'status'=>$status, 'solution'=>$solution);
	}

	function checkCache() {
		$cacheDir =  JPATH_BASE.DS.'cache'.DS.'com_ganalytics';
		$desc = "The directory ".$cacheDir." which is used by GAnalytics as cache directory is writable, this means you can enable caching in the GAnalytics component parameters.";
		$status = 'ok';
		$solution = '';
		JFolder::create($cacheDir, 0755);
		if ( !is_writable( $cacheDir ) ) {
			$desc = "The directory ".$cacheDir." which is used by GAnalytics as cache directory is not writable, this means you can't enable caching in the GAnalytics component parameters.";
			$status = 'failure';
			$solution = 'Set manually the write permission for the folder '.$cacheDir.' to writable.';
		}
		return array('name'=>'GAnalytics Cache Dir Check', 'description'=>$desc, 'status'=>$status, 'solution'=>$solution);
	}
	
	function checkPROMode(){
		$desc = "Cool you use the PRO mode!!";
		$status = 'ok';
		$solution = '';
		if ( !GAnalyticsUtil::isPROMode() ) {
			$desc = "You are using the FREE version which doesn't have all the features the PRO version has. <a href=\"http://g4j.laoneo.net/content/docu/doku.php/id,docu;ganalytics;pro/\" target=\"_blank\">Consider buying</a> the PRO version and get some cool graphical stuff and more.";
			$status = 'warning';
			$solution = '.';
		}
		return array('name'=>'GAnalytics Mode Check', 'description'=>$desc, 'status'=>$status, 'solution'=>$solution);
	}
	?>
