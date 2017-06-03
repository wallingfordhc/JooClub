<?php
defined('_JEXEC') or die;

class clubmanagerModelmatch extends JModelList
{
  public function __construct($config = array())
  {

    parent::__construct($config);
  }
  
  protected function populateState($ordering = null, $direction = null)
  {
	$id= JRequest::getInt('matchID');
	$this->setState('id', $id);
  }

  protected function getListQuery()
  {
    $db    = $this->getDbo();
    $query  = $db->getQuery(true);

    $query
	 
	  ->select($db->quoteName('h.groupname','hometeamname'))
	  ->select($db->quoteName('h.grouplogo','hometeamlogo'))
	  ->select($db->quoteName('a.groupname','awayteamname'))
	  ->select($db->quoteName('a.grouplogo','awayteamlogo'))
	  ->select($db->quoteName('m.homescore','homescore'))
	  ->select($db->quoteName('m.awayscore','awayscore'))
	  ->select($db->quoteName('l.shortname','location'))
	  ->select($db->quoteName('m.pushback','pushback'))
	  ->select($db->quoteName('m.status','status'));

    $query->from($db->quoteName('#__cmmatch').' AS m');
	$query->where('m.matchID='.(int)$id);
	$query->join('LEFT', $db->quoteName('#__cmgroup', 'h') . ' ON (' . $db->quoteName('m.hometeamID') . ' = ' . $db->quoteName('h.groupID') . ')');
	$query->join('LEFT', $db->quoteName('#__cmgroup', 'a') . ' ON (' . $db->quoteName('m.awayteamID') . ' = ' . $db->quoteName('a.groupID') . ')');
	$query->join('LEFT', $db->quoteName('#__cmlocation', 'l') . ' ON (' . $db->quoteName('m.locationID') . ' = ' . $db->quoteName('l.locationID') . ')');
    
    
	return $query;
  }
}		