<?php
defined('_JEXEC') or die;

class clubmanagerModelattendance extends JModelAdmin
{
  protected $text_prefix = 'COM_CLUBMANAGER';

  public function getTable($type = 'attendance', $prefix = 'clubmanagerTable', $config = array())
  {
    return JTable::getInstance($type, $prefix, $config);
  }

  public function getForm($data = array(), $loadData = true)
  {
    $app = JFactory::getApplication();

    $form = $this->loadForm('com_clubmanager.attendance', 'attendance', array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form))
    {
      return false;
    }

    return $form;
  }

  protected function loadFormData()
  {
    $data = JFactory::getApplication()->getUserState('com_clubmanager.edit.attendance.data', array());

    if (empty($data))
    {
      $data = $this->getItem();
    }

    return $data;
  }

  protected function prepareTable($table)
  {
    $table->hometeamID    = htmlspecialchars_decode($table->hometeamID, ENT_QUOTES);
  }

  
}