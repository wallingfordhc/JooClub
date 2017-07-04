<?php
defined('_JEXEC') or die;

class clubmanagerViewplayers extends JViewLegacy
{
  protected $items;
  protected $state;

  public function display($tpl = null)
  {
    $this->items = $this->get('Items');
	$this->state = $this->get('State');

    if (count($errors = $this->get('Errors')))
    {
      JError::raiseError(500, implode("\n", $errors));
      return false;
    }

 
    parent::display($tpl);
  }

  
}