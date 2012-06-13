<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Zend_Form_SubFormTest::main');
}

require_once dirname(__FILE__) . '/../../TestHelper.php';
require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

// error_reporting(E_ALL);

require_once 'Zend/Form/SubForm.php';

class Zend_Form_SubFormTest extends PHPUnit_Framework_TestCase
{
    public static function main()
    {
        require_once "PHPUnit/TextUI/TestRunner.php";
        $suite  = new PHPUnit_Framework_TestSuite('Zend_Form_SubFormTest');
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    public function setUp()
    {
        Zend_Form::setDefaultTranslator(null);

        $this->form = new Zend_Form_SubForm();
    }

    public function tearDown()
    {
    }

    // General
    public function testSubFormUtilizesDefaultDecorators()
    {
        $decorators = $this->form->getDecorators();
        $this->assertTrue(array_key_exists('Zend_Form_Decorator_FormElements', $decorators));
        $this->assertTrue(array_key_exists('Zend_Form_Decorator_HtmlTag', $decorators));
        $this->assertTrue(array_key_exists('Zend_Form_Decorator_Fieldset', $decorators));
        $this->assertTrue(array_key_exists('Zend_Form_Decorator_DtDdWrapper', $decorators));

        $htmlTag = $decorators['Zend_Form_Decorator_HtmlTag'];
        $tag = $htmlTag->getOption('tag');
        $this->assertEquals('dl', $tag);
    }

    public function testSubFormIsArrayByDefault()
    {
        $this->assertTrue($this->form->isArray());
    }

    public function testElementsBelongToSubFormNameByDefault()
    {
        $this->testSubFormIsArrayByDefault();
        $this->form->setName('foo');
        $this->assertEquals($this->form->getName(), $this->form->getElementsBelongTo());
    }
}

if (PHPUnit_MAIN_METHOD == 'Zend_Form_SubFormTest::main') {
    Zend_Form_SubFormTest::main();
}
