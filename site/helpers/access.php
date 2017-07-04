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
 
// provide a list of person_ids the given user can access
// uses the __cmconsent table which should contain a set of links between personID and CMS_userID

class clubmanageraccess
{

function personlist($userID)
{

 
 // if no personID sent to the function set it to be the current user
	if (empty($userID))
	{
	$userID = JFactory::getUser();
	}

	$db    = $this->getDbo();
    $query  = $db->getQuery(true);

    $query
	  ->select($db->quoteName('c.personID','personID'))
	  ->from($db->quoteName('#__cmconsent').' AS c')
	  ->where('(c.cmsuserID LIKE '.$userID.')');
	
	$db->setQuery($query);
	// get the data from the first column using JDatabase
	$results = $db->loadcolumn()

	return $results;

}
}