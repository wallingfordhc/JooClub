<?php
// no direct access
defined ('_JEXEC') or die;


abstract class JHtmlmatch
{
  // function that formats the drop down for changing the status of a match
  // $value is the current value of the status field
  // $i is the row number from the list
  static function status($value = 'unset',$i)
  {
    // array of allowed statuses image, task to be called, alt text for image, title for the <a>
    $statuses = array(
      'unset' => array('unset.png','unset','no status set','choose the match status'),
      //'future' => array('future.png','unset','future match','choose the match status'),
      //'underway' => array('underway.png','unset','underway','choose the match status'),
      'cancelled' => array('cancelled.png','status','cancelled','choose the match status'),
      'completed' => array('completed.png','finalscore','final score','choose the match status')
    );
    
    // get the values from $states based on the int value passed in as $value, or $states[1] as a default
    //$currentstatus = JArrayHelper::getValue($states, (int) $value, $states[1]);

	  $html = '
<div class="btn-group">
<button data-toggle="dropdown" class="dropdown-toggle btn btn-micro">
<span class="caret"></span><span class="element-invisible">Actions for: Getting Started</span></button>
<ul class="dropdown-menu">';

	  foreach ($statuses as $status) :
		  $html = $html.'<li><a href="javascript://" onclick=" return `listItemTask(\'cb'.$i.'\',\''.$status[1].'\')"><span class="icon-archive"></span>'.$status[2].'</a></li>';
	  endforeach;
    $html=$html.'</ul></div>';
	  return $html;
  }
}
