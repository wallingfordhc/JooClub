<?php
defined('_JEXEC') or die;

class clubmanagerModelmatchs extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'matchID',
		'pushback',
		'hometeamname',
		'awayteamname',
		'location'
      );
    }

    parent::__construct($config);
  }
  
  protected function populateState($ordering = null, $direction = null)
  {
    $search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
    $this->setState('filter.search', $search);
	parent::populateState('pushback', 'asc');
	
  }

  protected function getListQuery()
  {
    $db    = $this->getDbo();
    $query  = $db->getQuery(true);

    $query
	  ->select($db->quoteName('m.matchID','matchID'))
	  ->select($db->quoteName('h.groupname','hometeamname'))
	  ->select($db->quoteName('a.groupname','awayteamname'))
	  ->select($db->quoteName('m.homescore','homescore'))
	  ->select($db->quoteName('m.awayscore','awayscore'))
	  ->select($db->quoteName('l.shortname','location'))
	  ->select($db->quoteName('m.pushback','pushback'))
	  ->select($db->quoteName('m.status','status'));

    $query->from($db->quoteName('#__cmmatch').' AS m');
	$query->join('LEFT', $db->quoteName('#__cmgroup', 'h') . ' ON (' . $db->quoteName('m.hometeamID') . ' = ' . $db->quoteName('h.groupID') . ')');
	$query->join('LEFT', $db->quoteName('#__cmgroup', 'a') . ' ON (' . $db->quoteName('m.awayteamID') . ' = ' . $db->quoteName('a.groupID') . ')');
	$query->join('LEFT', $db->quoteName('#__cmlocation', 'l') . ' ON (' . $db->quoteName('m.locationID') . ' = ' . $db->quoteName('l.locationID') . ')');
    
	// Filter by search in title
    $search = $this->getState('filter.search');
    if (!empty($search))
    {
      if (stripos($search, 'id:') === 0)
      {
        $query->where('matchID= '.(int) substr($search, 3));
      } else {
        $search = $db->Quote('%'.$db->escape($search, true).'%');
        $query->where('(h.groupname LIKE '.$search.' OR a.groupname LIKE '.$search.' OR l.shortname LIKE '.$search.')');
      }
	}

	$orderCol = $this->state->get('list.ordering');
    $orderDirn = $this->state->get('list.direction');
    $query->order($db->escape($orderCol.' '.$orderDirn));
	return $query;
  }
}		