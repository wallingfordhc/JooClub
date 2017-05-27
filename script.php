<?php
defined('_JEXEC') or die;
 
class com_clubmanagerInstallerScript
{
  function install($parent) 
  {
    $parent->getParent()->setRedirectURL('index.php?option=com_clubmanager');
  }
 
  function uninstall($parent) 
  {
    echo '<p>' . JText::_('COM_CLUBMANAGER_UNINSTALL_TEXT') . '</p>';
  }
 
  function update($parent) 
  {
    echo '<p>' . JText::_('COM_CLUBMANAGER_UPDATE_TEXT') . '</p>';
  }
 
  function preflight($type, $parent) 
  {
    echo '<p>' . JText::_('COM_CLUBMANAGER_PREFLIGHT_' . $type . '_TEXT') . '</p>';
  }
 
  function postflight($type, $parent) 
  {
    echo '<p>' . JText::_('COM_CLUBMANAGER_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
  }
}