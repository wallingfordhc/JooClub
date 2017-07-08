<?php
defined('_JEXEC') or die;

class clubmanagerViewplayer extends JViewLegacy
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
	$this->includeAdminEnv();
    $this->addToolbar();
    parent::display($tpl);
  }

  protected function addToolbar()
  {
    
	
	JFactory::getApplication()->input->set('hidemainmenu', true);

    JToolbarHelper::title(JText::_('COM_CLUBMANAGER_MANAGER_PLAYER'), '');

    JToolbarHelper::save('player.save');

    if (empty($this->item->matchID))
    {
      JToolbarHelper::cancel('player.cancel');
    }
    else
    {
      JToolbarHelper::cancel('player.cancel', 'JTOOLBAR_CLOSE');
    }

	//generate the Html and return the toolbar
	return JToolBar::getInstance('toolbar')->render();
  }

  private function includeAdminEnv()
 	{
 		// load the language files for the admin messages as well
 		$language	= JFactory::getLanguage();
 		$language->load('joomla', JPATH_ADMINISTRATOR, null, true);
 		$language->load('com_clubmanager', JPATH_ADMINISTRATOR, null, true);
 
 		JLoader::register('JToolBarHelper',   JPATH_ADMINISTRATOR . '/includes/toolbar.php');
 		
  	}
}