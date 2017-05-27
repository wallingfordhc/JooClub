<?php
defined('_JEXEC') or die;

class clubmanagerModelmatches extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'matchid', 'a.matchid',
        'hometeamid', 'a.hometeamid',
      );
    }

    parent::__construct($config);
  }

  protected function getListQuery()
  {
    $db    = $this->getDbo();
    $query  = $db->getQuery(true);

    $query->select(
      $this->getState(
        'list.select',
        'a.matchid, a.hometeamid'
      )
    );
    $query->from($db->quoteName('#__cmmatch').' AS a');

    return $query;
  }
}