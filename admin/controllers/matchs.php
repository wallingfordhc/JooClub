<?php
defined('_JEXEC') or die;

class clubmanagerControllermatchs extends JControllerAdmin
{
  public function getModel($name = 'matchs', $prefix = 'clubmanagerModel', $config = array('ignore_request' => true))
  {
    $model = parent::getModel($name, $prefix, $config);
    return $model;
  }
}
