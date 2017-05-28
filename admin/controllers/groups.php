<?php
defined('_JEXEC') or die;

class clubmanagerControllergroups extends JControllerAdmin
{
  public function getModel($name = 'groups', $prefix = 'clubmanagerModel', $config = array('ignore_request' => true))
  {
    $model = parent::getModel($name, $prefix, $config);
    return $model;
  }
}
