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
 * clubmanager Component Controller
 *
 * @since  0.0.1
 */
class clubmanagerController extends JControllerLegacy
{
public function display($cachable = false, $urlparams = false)
  {
    require_once JPATH_COMPONENT.'/helpers/access.php';
    require_once JPATH_COMPONENT.'/helpers/card.php';
    require_once JPATH_COMPONENT.'/helpers/person.php';

    // $view   = $this->input->get('view', 'matches');
    // $layout = $this->input->get('layout', 'default');
    // $id     = $this->input->getInt('id');

  

    parent::display();

    return $this;
  }
}
