<?php
defined('_JEXEC') or die;

class clubmanagerControllermatch extends JControllerAdmin
{
  public function getModel($name = 'matches', $prefix = 'clubmanagerModel', $config = array('ignore_request' => true))
  {
    $model = parent::getModel($name, $prefix, $config);
    return $model;
  }
}
