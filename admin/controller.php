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
	protected $default_view = 'matchs';
	public function display($cachable = false, $urlparams = false)
  {
    require_once JPATH_COMPONENT.'/helpers/clubmanager.php';

    $view   = $this->input->get('view', 'matchs');
    $layout = $this->input->get('layout', 'default');
    // $id     = $this->input->getInt('id');

  

    parent::display();

    return $this;
  }
}