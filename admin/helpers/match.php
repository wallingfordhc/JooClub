<?php
// no direct access
defined ('_JEXEC') or die;


abstract class JHtmlmatch
{
  
  statis function status($value = 0,$i)
  {
    // array of image, task, title, action
    $states = array(
    0 => array('future.png','future')
    );
    $state = JArrayHelper::getValues($states, (int) $value, $states[1]);
    $html = JHtml::_('image','admin/'.$state[0], JText::_(state[2]),NULL,true);
    
    //if ($canchange) {
    
    $html = '<a href="#" onclick="return listItemTask(\'cb'.$i.'\',\''.$state[1].'\')" title="'.JText::_($state[3]).'">'
      .$html.'</a>';
   
    //}
    return $html;
  }
}