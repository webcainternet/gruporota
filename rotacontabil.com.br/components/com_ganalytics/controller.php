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

jimport('joomla.application.component.controller');

class GAnalyticsController extends JController {

	function display() {
		$hiddenView = null;
		if(JRequest::getVar('view', null) == 'jsonfeed')
		$hiddenView = 'JSONFeed';

		if($hiddenView !=null){
			$document =& JFactory::getDocument();

			$viewType	= $document->getType();
			$viewName	= JRequest::getCmd( 'view', $hiddenView );
			$viewLayout	= JRequest::getCmd( 'layout', 'default' );

			$this->addViewPath($this->_basePath.DS.'hiddenviews');
			$view = & $this->getView( $viewName, $viewType, '', array( 'base_path'=>$this->_basePath));
			$view->addTemplatePath($this->_basePath.DS.'hiddenviews'.DS.strtolower($viewName).DS.'tmpl');
		}
		parent::display();
	}

}
?>
