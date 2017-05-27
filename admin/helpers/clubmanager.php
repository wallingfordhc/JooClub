<?php
defined('_JEXEC') or die;

class clubmanagerHelper
{
  public static function getActions($categoryId = 0)
  {
    $user  = JFactory::getUser();
    $result  = new JObject;

    if (empty($categoryId))
    {
      $assetName = 'com_clubmanager';
      $level = 'component';
    }
    else
    {
      $assetName = 'com_clubmanager.category.'.(int) $categoryId;
      $level = 'category';
    }

    $actions = JAccess::getActions('com_clubmanager', $level);

    foreach ($actions as $action)
    {
      $result->set($action->name,  $user->authorise($action->name, $assetName));
    }

    return $result;
  }
}