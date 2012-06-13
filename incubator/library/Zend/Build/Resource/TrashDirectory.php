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
 * @package    Zend_Build
 * @subpackage Zend_Build_Resource
 * @copyright  Copyright (c) 2005-2008 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Interface.php 3412 2007-02-14 22:22:35Z darby $
 */

/**
 * @see Zend_Build_Resource_Directory
 */
require_once 'Zend/Build/Resource/Directory.php';

/**
 * @category   Zend
 * @package    Zend_Build
 * @subpackage Zend_Build_Resource
 * @uses       Zend_Build_Resource_Directory
 * @copyright  Copyright (c) 2005-2008 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Build_Resource_TrashDirectory extends Zend_Build_Resource_Directory
{
    /**
     * Maximum size of this directory in MB. This is a soft limit, since this limit is enforced AFTER
     * the current command has run.
     *
     * @var integer
     */
    public $maxSize = 100;

    /**
     * Set maximum size in MB
     *
     * @param  integer $size
     * @return void
     */
    public function setMaxSize ($size)
    {
        $this->size = $size;
    }

    /**
     * Get maximum size in MB
     *
     * @return integer
     */
    public function getMaxSize ()
    {
        return $this->size;
    }
}