<?php
defined('_JEXEC') or die;

class clubmanagerControllermatches extends JControllerAdmin
{
  public function getModel($name = 'match', $prefix = 'clubmanagerModel', $config = array('ignore_request' => true))
  {
    $model = parent::getModel($name, $prefix, $config);
    return $model;
  }

  // adds an extra button to the matches toolbar
  public function finalscore()
	{
 
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
 
		// Sanitize the input
		JArrayHelper::toInteger($pks);
 
		// Get the model
		$model = $this->getModel();
 
		$return = $model->finalscore($pks);
 
		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_clubmanager&view=matches', false));
 
	}
	
	// method to change the status view of matches
	
	function status()
	{
		// initislise variables
		$user = JFactory::getUser();
		$ids = JRequest::getVar('cid', array(), '','array');
		$values = array('future' => 1, 'finished' => 0);
		$task = $this->getTask();
		$value = JArrayHelper::getValue($values, $task , 0, 'int');
		
		if (empty($ids))
		{
			JError::raiseWarning(500, JText::_('JERROR_NO_ITEMS_SELECTED'));
		}
		else
		{
			// get the model
			$model = $this->getModel('matches');
			
			// Publish the items
			if (!model->status($ids, $value))
			{
				JError::raiseWarning(500, $model->getError());
			}
			
		}
		
		$redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option'));
		$this->setRedirect($redirectTo);
	}
}
