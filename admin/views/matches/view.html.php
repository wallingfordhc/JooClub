<?php
defined('_JEXEC') or die;

class clubmanagerViewmatches extends JViewLegacy
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
    $canDo  = FolioHelper::getActions();
    $bar = JToolBar::getInstance('toolbar');

    JToolbarHelper::title(JText::_('COM_CLUBMANAGER_MANAGER_FOLIOS'), '');

    JToolbarHelper::addNew('match.add');

    if ($canDo->get('core.edit'))
    {
      JToolbarHelper::editList('match.edit');
    }
    if ($canDo->get('core.admin'))
    {
      JToolbarHelper::preferences('com_clubmanager');
    }
  }
}