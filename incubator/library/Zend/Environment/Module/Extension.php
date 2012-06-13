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
 * Zend_Environment_Module_Abstract
 */
require_once 'Zend/Environment/Module/Abstract.php';


/**
 * @category   Zend
 * @package    Zend_Environment
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Environment_Module_Extension extends Zend_Environment_Module_Abstract
{
    protected $_type = 'extension';
    
    protected function _init()
    {
        $sections = $this->_parsePhpInfo(INFO_MODULES);

        foreach($sections as $section => $value) {
            $field = new Zend_Environment_Field(array('title' => $section,
                                                      'info' => $value));

            if (($version = $this->_checkExtensionVersion($value))) {
                $field->version = $version['version'];
            }

            $field->link = self::PATH_PHP_MANUAL . '/ini/';
            $this->{$section} = $field;
        }
    }

    /**
     * Parses phpinfo() module information to determine correct version
     *
     * @param  array $info
     * @return false|array
     */
    protected function _checkExtensionVersion($info)
    {
        $matches = preg_grep("!(revision|version)!i", array_keys($info));
        $version = array();
        
        if (!isset($info[current($matches)])) {
            return false;
        }

        $value = (array) $info[current($matches)];
        preg_match('/(\d[\d\w\.\-_]+)/', $value[0], $version);

        if (!count($version)) {
            return false;
        }

        return array('version' => current($version), 'string' => $value);
    }
}
