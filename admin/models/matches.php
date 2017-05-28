<?php
defined('_JEXEC') or die;

class clubmanagerModelmatches extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'matchID', 'a.matchID'
      );
    }

    parent::__construct($config);
  }
  
  protected function getListQuery()
  {
    $db    = $this->getDbo();
    $query  = $db->getQuery(true);

    $query
	  ->select($db->quoteName('a.matchID','matchID'))
	  ->select($db->quoteName('b.groupname','hometeamname'))
	  ->select($db->quoteName('c.groupname','awayteamname'))
	  ->select($db->quoteName('a.pushback','pushback'));

    $query->from($db->quoteName('#__cmmatch').' AS a');
	$query->join('INNER', $db->quoteName('#__cmgroup', 'b') . ' ON (' . $db->quoteName('a.hometeamID') . ' = ' . $db->quoteName('b.groupID') . ')');
	$query->join('INNER', $db->quoteName('#__cmgroup', 'c') . ' ON (' . $db->quoteName('a.awayteamID') . ' = ' . $db->quoteName('c.groupID') . ')');
    return $query;
  }
}