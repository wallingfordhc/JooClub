<?php
defined('_JEXEC') or die;

class clubmanagerViewmatch extends JViewLegacy
{
   protected $matchitems;
   protected $playeritems;

   public function display($tpl = null)
   {
      
	 

      $app = JFactory::getApplication();
	  $this->matchitems = $this->get('Items');
      $params = $app->getParams();
      $this->assignRef( 'params', $params );

      if (count($errors = $this->get('Errors')))
      {
         JError::raiseError(500, implode("\n", $errors));
         return false;
      }

	  //  sets default model
        $this->setModel( $this->getModel( 'match' ), true );
//  sets second model & uses 'JModelLegacy,' contrary to documentation
        $this->setModel(JModelLegacy::getInstance('player', 'clubmanagerModel'));
//  assigns array from the second model to 'ItemsOtherModel.' there is no '$' sign used.
        $this->playeritems = $this->get('Items','player');

      parent::display($tpl);
   }
}