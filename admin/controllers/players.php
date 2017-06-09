<?php
defined('_JEXEC') or die;

class clubmanagerControllerplayers extends JControllerAdmin
{
  public function getModel($name = 'player', $prefix = 'clubmanagerModel', $config = array('ignore_request' => true))
  {
    $model = parent::getModel($name, $prefix, $config);
    return $model;
  }
}
