<?php
defined('_JEXEC') or die;

class clubmanagerModelplayers extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'playerID',
		'firstname',
		'surname',
		'shirtnumber',
		'email',
		'phonenumber'
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
	$id= JRequest::getInt('matchID');

    $query
	  
	  // need to work out query to return players list for match view on site

	return $query;
  }
}		