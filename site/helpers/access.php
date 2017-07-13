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

class clubmanageraccess
{


function personlist($userID = null)
{

 // if no personID sent to the function set it to be the current user
	if (empty($userID))
	{
	$user = JFactory::getUser();
	$userID = $user->id;
	}
// look to see what viewing rights the user has
$levels = JAccess::getAuthorisedViewLevels($userID);
	
// set up the database
$db    = JFactory::getDbo();
	
	
	// if they are a registered user - should be everyone TODO check to ensure they are in good standing
	if(in_array("1",$levels))
		{
		$query  = $db->getQuery(true);
		$query
	  ->select($db->quoteName('c.personID','personID'))
	  ->from($db->quoteName('#__cmconsent').' AS c')
	  ->where('(c.cmsuserID LIKE '.$userID.')');
		
		}

	// if they are a team captain 
	if (in_array("Team Captain",$levels))
		{
		// append a list of all personIDs in the teamcaptains team
		$query2 = $db->getQuery(true);
		$query2
		->select($db->quoteName('p.personID','personID'))
		->from($db->quoteName('#__cmgroupconsent').' AS gc')
		->join('LEFT', $db->quoteName('#__cmgroup', 'g') . ' ON (' . $db->quoteName('gc.groupID') . ' = ' . $db->quoteName('g.groupID') . ')')
		->join('LEFT', $db->quoteName('#__cmgrouproster', 'gr') . ' ON (' . $db->quoteName('gr.groupID') . ' = ' . $db->quoteName('p.personID') . ')')
		->join('LEFT', $db->quoteName('#__cmperson', 'p') . ' ON (' . $db->quoteName('p.personID') . ' = ' . $db->quoteName('gr.personID') . ')')
		->where('(gc.cmsuserID LIKE '.$userID.')');

		$query->union($query2);
		}

	//if they are a super user
	if (in_array(6,$levels))
		{
		// append a list of all personIDs
		$query3 = $db->getQuery(true);
		$query3
		->select($db->quoteName('p.personID','personID'))
		->from($db->quoteName('#__cmperson').' AS p');

		$query->union($query3);
		}


	return $query;

}
}