<?php
defined('_JEXEC') or die;

class clubmanagerViewgroups extends JViewLegacy
{
  protected $items;

  public function display($tpl = null)
  {
    $this->items    = $this->get('Items');

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

    JToolbarHelper::title(JText::_('COM_CLUBMANAGER_MANAGER_GROUPS'), '');

    JToolbarHelper::addNew('group.add');

    if ($canDo->get('core.edit'))
    {
      JToolbarHelper::editList('group.edit');
    }
    if ($canDo->get('core.admin'))
    {
      JToolbarHelper::preferences('com_clubmanager');
    }
  }
}