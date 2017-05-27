<?php
defined('_JEXEC') or die;

class clubmanagerModelmatches extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields']))
    {
      $config['filter_fields'] = array(
        'matchID', 'a.matchID',
        'hometeamID', 'a.hometeamID',
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
        'a.matchID, a.hometeamID , a.awayteamID, a.pushback'
      )
    );
    $query->from($db->quoteName('#__cmmatch').' AS a');

    return $query;
  }
}