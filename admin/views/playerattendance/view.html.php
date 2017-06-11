<?php
defined('_JEXEC') or die;

class clubmanagerViewplayerattendance extends JViewLegacy
{
  protected $item;

  protected $form;

  public function display($tpl = null)
  {
    $this->item    = $this->get('Item');
    $this->form    = $this->get('Form');

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
    JFactory::getApplication()->input->set('hidemainmenu', true);

    JToolbarHelper::title(JText::_('COM_CLUBMANAGER_MANAGER_PLAYERATTENDANCE'), '');

    JToolbarHelper::save('player.save');

    if (empty($this->item->matchID))
    {
      JToolbarHelper::cancel('player.cancel');
    }
    else
    {
      JToolbarHelper::cancel('player.cancel', 'JTOOLBAR_CLOSE');
    }
  }
}