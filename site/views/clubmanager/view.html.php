	<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_clubmanager
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the clubmanager Component
 *
 * @since  0.0.2
 */
class clubmanagerViewclubmanager extends JViewLegacy
{
	/**
	 * Display the clubmanager view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */

	 protected $items;

	function display($tpl = null)
	{
		// Assign data to the view
		$this->items = $this->get('Items');
 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
 
			return false;
		}
 
		// Display the view
		parent::display($tpl);
	}
}