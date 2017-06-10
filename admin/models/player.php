<?php
defined('_JEXEC') or die;

class clubmanagerModelplayer extends JModelAdmin
{
  protected $text_prefix = 'COM_CLUBMANAGER';

  public function getTable($type = 'player', $prefix = 'clubmanagerTable', $config = array())
  {
    return JTable::getInstance($type, $prefix, $config);
  }

  public function getForm($data = array(), $loadData = true)
  {
    $app = JFactory::getApplication();

    $form = $this->loadForm('com_clubmanager.player', 'player', array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form))
    {
      return false;
    }

    return $form;
  }

  protected function loadFormData()
  {
    $data = JFactory::getApplication()->getUserState('com_clubmanager.edit.player.data', array());

    if (empty($data))
    {
      $data = $this->getItem();
    }

    return $data;
  }

  protected function prepareTable($table)
  {
    $table->personID    = htmlspecialchars_decode($table->personID, ENT_QUOTES);
  }
}