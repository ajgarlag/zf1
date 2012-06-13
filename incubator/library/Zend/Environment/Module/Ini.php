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
 * Zend_View_Abstract
 */
require_once('Zend/Environment/Module/Abstract.php');


/**
 * @category   Zend
 * @package    Zend_Environment
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Environment_Module_Ini extends Zend_Environment_Module_Abstract
{
    protected $_type = 'ini';
    
    protected function _init()
    {
        $sections = $this->_parsePhpInfo(INFO_CONFIGURATION);

        foreach ($sections['php_core'] as $section => $value) {
            $field = new Zend_Environment_Field;
            $field->title = $section;
            $field->value = $value[0];
            $field->info = $value[1];
            $field->link = self::PATH_PHP_MANUAL . '/ini/';
            $this->{$section} = $field;
        }
    }
}
