<?php
defined('_JEXEC') or die;

class clubmanagerModelmatch extends JModelAdmin
{
  protected $text_prefix = 'COM_CLUBMANAGER';

  public function getTable($type = 'group', $prefix = 'clubmanagerTable', $config = array())
  {
    return JTable::getInstance($type, $prefix, $config);
  }

  public function getForm($data = array(), $loadData = true)
  {
    $app = JFactory::getApplication();

    $form = $this->loadForm('com_clubmanager.group', 'group', array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form))
    {
      return false;
    }

    return $form;
  }

  protected function loadFormData()
  {
    $data = JFactory::getApplication()->getUserState('com_clubmanager.edit.group.data', array());

    if (empty($data))
    {
      $data = $this->getItem();
    }

    return $data;
  }

  protected function prepareTable($table)
  {
    $table->groupID    = htmlspecialchars_decode($table->groupID, ENT_QUOTES);
  }
}