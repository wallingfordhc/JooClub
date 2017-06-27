<?php
// no direct access
defined ('_JEXEC') or die;


abstract class JHtmlmatch
{
  // function that formats the drop down for changing the status of a match
  // $value is the current value of the status field
  // $i is the row number from the list
  static function status($value = 0,$i)
  {
    // array of image, task to be called, alt text for image, title for the <a> 
    $states = array(
      0 => array('future.png','future','Match is in the future','choose the match status'),
      1 => array('completed.png','completed','Match has completed','choose the match status')
    );
    
    // get the values from $states based on the int value passed in as $value, or $states[1] as a default
    $state = JArrayHelper::getValue($states, (int) $value, $states[1]);
    
    // form the image part of the html return
    $html = JHtml::_('image','admin/'.$state[0], JText::_($state[2]),NULL,true);
    
    // if the user can change the value add an <a> tag and the required onclick functionality
    //if ($canchange) {
    
    //listItemTask calls the task from the $state array against the row item given by $i - the task is in the 
    $html = '<a href="#" onclick="return listItemTask(\'cb'.$i.'\',\''.$state[1].'\')" title="'.JText::_($state[3]).'">'
      .$html.'</a>';
   
    //}
    return $html;
  }
}
