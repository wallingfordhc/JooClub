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
  public function extrahello()
	{
 
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
 
		// Sanitize the input
		JArrayHelper::toInteger($pks);
 
		// Get the model
		$model = $this->getModel();
 
		$return = $model->extrahello($pks);
 
		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_clubmanager&view=matches', false));
 
	}
}
