<?php
defined('_JEXEC') or die;

class clubmanagerModelplayers extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'personID',
		'firstname',
		'surname',
		'shirtnumber',
		'email',
		'phone'
      );
    }

    parent::__construct($config);
  }
  
  protected function populateState($ordering = null, $direction = null)
  {
    $search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
    $this->setState('filter.search', $search);
	parent::populateState('surname', 'asc');
	
  }

  protected function getListQuery()
  {
    $db    = $this->getDbo();
    $query  = $db->getQuery(true);

    $query
	  ->select($db->quoteName('p.personID','personID'))
	  ->select($db->quoteName('p.firstname','firstname'))
	  ->select($db->quoteName('p.surname','surname'))
	  ->select($db->quoteName('g.groupname','groupname'))
	  ->select($db->quoteName('p.email','email'))
	  ->select($db->quoteName('p.phonenumber','phone'))
	  ->select($db->quoteName('p.shirtnumber','shirtnumber'))
	  ->select($db->quoteName('p.gender','gender'))
	  ;

    $query->from($db->quoteName('#__cmperson').' AS p');
	$query->join('LEFT', $db->quoteName('#__cmgrouproster', 'gr') . ' ON (' . $db->quoteName('p.personID') . ' = ' . $db->quoteName('gr.personID') . ')');
	$query->join('LEFT', $db->quoteName('#__cmgroup', 'g') . ' ON (' . $db->quoteName('gr.groupID') . ' = ' . $db->quoteName('g.groupID') . ')');
	
    
	// Filter by search in title
    $search = $this->getState('filter.search');
    if (!empty($search))
    {
      if (stripos($search, 'id:') === 0)
      {
        $query->where('personID= '.(int) substr($search, 3));
      } else {
        $search = $db->Quote('%'.$db->escape($search, true).'%');
        $query->where('(p.firstname LIKE '.$search.' OR p.surname LIKE '.$search.' OR g.groupname LIKE '.$search.')');
      }
	}

	$orderCol = $this->state->get('list.ordering');
    $orderDirn = $this->state->get('list.direction');
    $query->order('p.surname');
	return $query;
  }
}		