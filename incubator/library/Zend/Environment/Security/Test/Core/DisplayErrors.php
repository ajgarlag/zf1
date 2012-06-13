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
 * require the Zend_Environment_Security_Test_Core class
 */
require_once 'Zend/Environment/Security/Test/Core.php';

/**
 * Test class for display_errors
 *
 * @package Zend_Environment
 */
class Zend_Environment_Security_Test_Core_DisplayErrors extends Zend_Environment_Security_Test_Core
{

    /**
	 * This should be a <b>unique</b>, human-readable identifier for this test
	 *
	 * @var string
	 */
    protected $_name = "display_errors";

    protected $_recommended_value = FALSE;

    protected function _retrieveCurrentValue() {
        $this->_current_value = $this->getIniValue('display_errors');
    }


    /**
	 * Checks to see if display_errors is enabled
	 *
	 */
    protected function _execTest() {
        if ($this->_current_value == $this->_recommended_value) {
            return self::RESULT_OK;
        }

        return self::RESULT_NOTICE;
    }


    /**
	 * Set the messages specific to this test
	 *
	 */
    protected function _setMessages() {
        parent::_setMessages();

        $this->setMessageForResult(self::RESULT_OK, 'en', 'display_errors is disabled, which is the recommended setting');
        $this->setMessageForResult(self::RESULT_NOTICE, 'en', 'display_errors is enabled.  This is not recommended on "production" servers, as it could reveal sensitive information.  You should consider disabling this feature');
    }


}