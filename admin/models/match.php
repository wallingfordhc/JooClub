<?php
defined('_JEXEC') or die;

class clubmanagerModelmatch extends JModelAdmin
{
  protected $text_prefix = 'COM_CLUBMANAGER';

  public function getTable($type = 'match', $prefix = 'clubmanagerTable', $config = array())
  {
    return JTable::getInstance($type, $prefix, $config);
  }

  public function getForm($data = array(), $loadData = true)
  {
    $app = JFactory::getApplication();

    $form = $this->loadForm('com_clubmanager.match', 'match', array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form))
    {
      return false;
    }

    return $form;
  }

  protected function loadFormData()
  {
    $data = JFactory::getApplication()->getUserState('com_clubmanager.edit.match.data', array());

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

  public function finalscore($pks)
	{

	if (empty($pks))
	{
	$this->setError(JText::_('NO_MATCHIDS_SELECTED'));
	return FALSE;
	}
 
		// perform whatever you want on each item checked in the list
 $db = JFactory::getDbo();
 
$query = $db->getQuery(true);
 
// Fields to update.
$fields = array(
    $db->quoteName('status') . ' = ' . $db->quote('Full Time')
);
 
// Conditions for which records should be updated.
$conditions = array(
    $db->quoteName('matchID') . 'IN ('. implode(',',$pks).')' 
);
 
$query->update($db->quoteName('#__cmmatch'))->set($fields)->where($conditions);
 
$db->setQuery($query);
 
$result = $db->execute();
		echo 'Hello Hello Hello';
		//return true;
 
	}
}