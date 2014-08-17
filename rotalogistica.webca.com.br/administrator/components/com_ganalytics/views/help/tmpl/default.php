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
<table width="400px">
	<tr>
		<td valign="top">
		<h2>GAnaltics Help</h2>

		<p>GAnalytics connects the googla analytics service with your joomla
		powered web site. Easy to use and flexibility are the main targets of
		GAnalytics.<br />
		<br />
		<b>How Google advertises his analytics service:</b><br />
		<i> Google Analytics is the enterprise-class web analytics solution
		that gives you rich insights into your website traffic and marketing
		effectiveness. Powerful, flexible and easy-to-use features now let you
		see and analyze your traffic data in an entirely new way. With Google
		Analytics, you're more prepared to write better-targeted ads,
		strengthen your marketing initiatives and create higher converting
		websites.</i></p>

		<?php if(!GAnalyticsUtil::isProMode()){?>
		<h2>Donation</h2>
		There is more effort behind GAnalytics than you think... <br>
		<br>
		You get this extensions for free but the project depends on donations
		to support further releases and new features!! Please make a small
		donation with paypal.....<br>
		<br>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input
			type="hidden" name="cmd" value="_s-xclick"> <input type="hidden"
			name="hosted_button_id" value="302238"> <input type="image"
			src="https://www.paypal.com/en_US/CH/i/btn/btn_donateCC_LG.gif"
			border="0" name="submit" alt=""> <img alt="" border="0"
			src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1"
			height="1"></form>
			<?php }?>
		<h2>Documentation and Support</h2>
		At <a href="http://g4j.laoneo.net" target="_blank">g4j.laoneo.net</a>
		you will find all the informations about the project as well as a
		forum to post questions.</td>
	</tr>
</table>
