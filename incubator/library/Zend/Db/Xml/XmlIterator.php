<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to version 1.0 of the Zend Framework
 * license, that is bundled with this package in the file LICENSE, and
 * is available through the world-wide-web at the following URL:
 * http://www.zend.com/license/framework/1_0.txt. If you did not receive
 * a copy of the Zend Framework license and are unable to obtain it
 * through the world-wide-web, please send a note to license@zend.com
 * so we can mail you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Db_Xml
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://www.zend.com/license/framework/1_0.txt Zend Framework License version 1.0
 */

/**
 * Zend_Db_Xml_XmlContent
 */
require_once('Zend/Db/Xml/XmlContent.php');

/**
 * Zend_Db_Xml_XmlIterator is an iterable collection of Zend_Db_Xml_XmlContent objects.
 * 
 * @category   Zend
 * @package    Zend_Db_Xml
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://www.zend.com/license/framework/1_0.txt Zend Framework License version 1.0
 * @author     Salvador Ledezma <ledezma@us.ibm.com>
 */
class Zend_Db_Xml_XmlIterator implements Iterator
{
	protected $_docIndex = 0;
	
	/**
	 * @var array
	 */
	protected $_docs;
	
	/**
	 * Zend_Db_Xml_XmlIterator constructor
	 *
	 */
	public function __construct()
	{
		$this->_docs = array();
	}
	
	/**
	 * Add an Zend_Db_Xml_XmlContent to list
	 *
	 * @param Zend_Db_Xml_XmlContent $xmldoc
	 */
	public function add($xmldoc)
	{
		$this->_docs[] = $xmldoc;
	}

	/**
	 * Get the number of documents in the list
	 * 
	 * @return integer Zend_Db_Xml_XmlContent count
	 */
	public function count()
	{
		return count($this->_docs);
	}
	
	/**
	 * Required by the Iterator interface
	 *
	 * @internal
	 */
	public function rewind()
	{
		$this->_docIndex = 0;
	}

	/**
	 * Required by the Iterator interface
	 *
	 * @internal
	 *
	 * @return Zend_Db_Xml_XmlContent the current document
	 */
	public function current()
	{
		if ($this->valid()) {
			return $this->_docs[$this->_docIndex];
		}
	}

	/**
	 * Required by the Iterator interface
	 *
	 * @internal
	 *
	 * @return mixed The current key (starts at 0)
	 */
	public function key()
	{
		return $this->_docIndex;
	}

	/**
	 * Required by the Iterator interface
	 *
	 * @internal
	 *
	 * @return mixed The next content document, or null if no more items
	 */
	public function next()
	{
		++$this->_docIndex;
		if($this->valid()) {
			return $this->_docs[$this->_docIndex];
		} else {
			return null;
		}
	}

	/**
	 * Required by the Iterator interface
	 *
	 * @internal
	 *
	 * @return boolean whether the iteration is valid
	 */
	public function valid()
	{
		return (0 <= $this->_docIndex && $this->_docIndex < $this->count());
	}
}
