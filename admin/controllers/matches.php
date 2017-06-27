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
	// -- should be called from the list views to allow update of values in the list views
	
	function status()
	{
		// initislise variables
		
		//get current user object
		$user = JFactory::getUser();
		
		//get array of ids to update
		$ids = JRequest::getVar('cid', array(), '','array');
		
		//prepare an array of values to update the status to
		$values = array('future' => 1, 'finished' => 0);
		
		// get the value of the requested task
		$task = $this->getTask();
		
		// get the value to store associated with the given task - not sure this is the right approach
		$value = JArrayHelper::getValue($values, $task , 0, 'int');
		
		//check to see if there are any ids passed
		if (empty($ids))
		{
			JError::raiseWarning(500, JText::_('JERROR_NO_ITEMS_SELECTED'));
		}
		else
		{
			// get the model
			$model = $this->getModel('matches');
			
			// Publish the items - call the status function in the model to update the values
			if (!model->status($ids, $value))
			{
				JError::raiseWarning(500, $model->getError());
			}
			
		}
		// reload the page based on teh option value in the request
		$redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option'));
		$this->setRedirect($redirectTo);
	}
}
