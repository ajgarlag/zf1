<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Environment
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Exception.php 2794 2007-01-16 01:29:51Z bkarwin $
 */

/**
 * Zend_Environment_Container_Abstract
 */
require_once 'Zend/Environment/Security/Test.php';



abstract class Zend_Environment_Security_Test_Session extends Zend_Environment_Security_Test
{

    protected $_group = 'session';

	/**
	 * "Session" tests should pretty much be always testable, so the default is
	 * just to return true
	 * 
	 * @return boolean
	 */
	public function isTestable() {
		
		return true;
	}
}