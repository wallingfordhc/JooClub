<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_clubmanager
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 *clubmanager Model
 *
 * @since  0.0.5
 */
class clubmanagerModelclubmanager extends JModelItem
{
	/**
	 * @var string message
	 */
	protected $message;
 
	/**
	 * Get the message
         *
	 * @return  string  The message to be displayed to the user
	 */
	public function getMsg()
	{
		if (!isset($this->message))
		{
			$this->message = 'Hello club World!';
		}
 
		return $this->message;
	}
}