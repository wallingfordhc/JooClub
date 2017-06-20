<?php
defined('_JEXEC') or die;

class clubmanagerViewmatches extends JViewLegacy
{
  protected $items;
  protected $state;

  public function display($tpl = null)
  {
    $this->items    = $this->get('Items');
	$this->state = $this->get('State');

    if (count($errors = $this->get('Errors')))
    {
      JError::raiseError(500, implode("\n", $errors));
      return false;
    }

    $this->addToolbar();
    parent::display($tpl);
  }

  protected function addToolbar()
  {
    $canDo  = clubmanagerHelper::getActions();
    $bar = JToolBar::getInstance('toolbar');

    JToolbarHelper::title(JText::_('COM_CLUBMANAGER_MANAGER_matches'), '');

    JToolbarHelper::addNew('match.add');

    if ($canDo->get('core.edit'))
    {
      JToolbarHelper::editList('match.edit');
    }
	if ($canDo->get('core.delete'))
    {
      JToolBarHelper::deleteList('Are you sure?', 'matches.delete', 'JTOOLBAR_DELETE');
    }
    if ($canDo->get('core.admin'))
    {
      JToolbarHelper::preferences('com_clubmanager');
    }

	// testing adding another toolbar button
	JToolBarHelper::custom('matches.extrahello', 'extrahello.png', 'extrahello_f2.png', 'Extra Hello', true);
  }
  
}