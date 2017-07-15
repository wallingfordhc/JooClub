<?php

// set up register so that if it is a register taker the id gets added to the attendance list
// if its just a memebr of the public they see a login page


// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * Hello World Component Controller
 */
class clubmanagerControllerregister extends JControllerForm 
{
  function shout()
  {
      $session = JFactory::getSession();
      $session->set("register","true");

    echo "<p>THIS IS ME SHOUTING!</p>";
  }
}