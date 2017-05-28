<?php
defined('_JEXEC') or die;

class clubmanagerModelgroups extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'groupID', 'g.groupID'
      );
    }

    parent::__construct($config);
  }
  
  protected function getListQuery()
  {
    $db    = $this->getDbo();
    $query  = $db->getQuery(true);

    $query ->select(
	  $this->getState(
	'list.select','g.groupID,g.groupname,g.grouplogo'
	)
	);

    $query->from($db->quoteName('#__cmgroup').' AS g');
	
    return $query;
  }
}		