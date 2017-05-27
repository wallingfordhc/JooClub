<?php

 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
class clubmanagerController extends JControllerLegacy
{
	/**
	 * The default view for the display method.
	 *
	 * @var string
	 *
	 */
	protected $default_view = 'matches';
	public function display($cachable = false, $urlparams = false)
  {
    require_once JPATH_COMPONENT.'/helpers/clubmanager.php';

    $view   = $this->input->get('view', 'matches');
    $layout = $this->input->get('layout', 'default');
    // $id     = $this->input->getInt('id');

  

    parent::display();

    return $this;
  }
}