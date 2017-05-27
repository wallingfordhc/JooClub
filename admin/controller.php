<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_clubmanager
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * General Controller of clubmanager component
 *
 * @package     Joomla.Administrator
 * @subpackage  com_clubmanager
 * @since       0.0.6
 */
class clubmanagerController extends JControllerLegacy
{
	/**
	 * The default view for the display method.
	 *
	 * @var string
	 * @since 12.2
	 */
	protected $default_view = 'matches';
	public function display($cachable = false, $urlparams = false)
  {
    require_once JPATH_COMPONENT.'/helpers/clubmanager.php';

    $view   = $this->input->get('view', 'matches');
    $layout = $this->input->get('layout', 'default');
    $id     = $this->input->getInt('id');

  

    parent::display();

    return $this;
  }
}