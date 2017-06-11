<?php
defined('_JEXEC') or die;
class clubmanagerControllerplayerattendance extends JControllerForm
{
$view = $this->getView( 'playerattendance', 'html' );
$view->setModel( $this->getModel( 'player' ), true );
$view->setModel( $this->getModel( 'matches' ) );
$view->display();
}