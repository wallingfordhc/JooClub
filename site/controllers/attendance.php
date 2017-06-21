<?php
defined('_JEXEC') or die;
class clubmanagerControllerattendance extends JControllerForm
{

protected function allowAdd($data = array())
	{
		//$user		= JFactory::getUser();
		//$categoryId	= JArrayHelper::getValue($data, 'catid', $this->input->getInt('catid'), 'int');
		$allow		= true;
	
		return $allow;
		
	}

}