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

    $query
	  ->select($db->quoteName('g.groupID','groupID'))
	  ->select($db->quoteName('g.groupname','groupname'))
	  ->select($db->quoteName('g.grouplogo','grouplogo'))
	  ->select($db->quoteName('m.description','description'));

    $query->from($db->quoteName('#__cmgroup').' AS g');
	
    return $query;
  }
}		