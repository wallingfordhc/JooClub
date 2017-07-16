<?php
defined('_JEXEC') or die;

class clubmanagerViewattendance extends JViewLegacy
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
$this->includeAdminEnv();
 
    parent::display($tpl);
  }

 protected function addToolbar()
  {
    
	
    JFactory::getApplication()->input->set('hidemainmenu', true);

    JToolbarHelper::title(JText::_('COM_CLUBMANAGER_MANAGER_PLAYERS'), '');

    JToolbarHelper::addNew('player.add');
    JToolbarHelper::editList('player.edit');
    
    // @todo add player.retire functrionality

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