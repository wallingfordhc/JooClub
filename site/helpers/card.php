<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_clubmanager
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// provide a subquery that provides list of person_ids the given user can access

class card
{
 function creatememcard()
 {
     $personid = 1234; 
     $templatepath = JPATH_COMPONENT."/media/";
      $templatefile = "Membership card front - Blank_FrontFace.png";
      
      $outputimage = imagecreatefrompng($templatepath.$templatefile);
      imagepng($outputimage, $templatepath."memcard".$personid.".png");
      imagedestroy($outputimage);
 }
}
