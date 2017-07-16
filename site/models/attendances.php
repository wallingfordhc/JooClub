<?php
defined('_JEXEC') or die;

class clubmanagerModelattendances extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'attendanceID',
		'arrived',
		'surname',
		'firstname'
		
      );
    }

    parent::__construct($config);
  }
  
  protected function populateState($ordering = null, $direction = null)
  {
    $search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
    $this->setState('filter.search', $search);
	parent::populateState('arrived', 'asc');
	
  }

  // return the data for the attendances this user can see
  protected function getListQuery()
  {
    // prepare for a database connection
	$db    = $this->getDbo();
	//set this as a new query
    $query  = $db->getQuery(true);

	// set the select statement fo the query
    $query
          ->select($db->quoteName('a.attendanceID','attendanceID'))
          ->select($db->quoteName('a.arrived','arrived'))
	  ->select($db->quoteName('p.personID','personID'))
	  ->select($db->quoteName('p.firstname','firstname'))
	  ->select($db->quoteName('p.surname','surname'))
	  ->select($db->quoteName('p.email','email'))
	  ->select($db->quoteName('p.phonenumber','phone'))
	  ->select($db->quoteName('p.shirtnumber','shirtnumber'))
	  ->select($db->quoteName('p.gender','gender'))
	  ->select($db->quoteName('p.profileimage_url','profileimage_url'))
            ->select($db->quoteName('p.agegroup','agegroup'))
	  ;
// chain the 'from' part of the query
    
    $query->from($db->quoteName('#__cmattendance').' AS a');
    $query->join('LEFT', $db->quoteName('#__cmperson', 'p') . ' ON (' . $db->quoteName('a.personID') . ' = ' . $db->quoteName('p.personID') . ')');
    
	
	
	
	// @todo Filter by location

    
	// Filter by search in title
    $search = $this->getState('filter.search');
    if (!empty($search))
    {
      if (stripos($search, 'id:') === 0)
      {
        $query->where('personID= '.(int) substr($search, 3));
      } else {
        $search = $db->Quote('%'.$db->escape($search, true).'%');
        $query->where('(p.firstname LIKE '.$search.' OR p.surname LIKE '.$search.')','AND');
      }
	}

	$orderCol = $this->state->get('list.ordering');
    $orderDirn = $this->state->get('list.direction');
    $query->order('p.surname');
	return $query;
  }
}		