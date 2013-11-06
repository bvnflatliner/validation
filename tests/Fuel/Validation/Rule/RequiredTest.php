<?php
/**
 * @package   Fuel\Validation
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

namespace Fuel\Validation\Rule;

/**
 * Class RequiredTest
 *
 * @package Fuel\Validation\Rule
 * @author  Fuel Development Team
 *
 * @covers  \Fuel\Validation\Rule\Required
 */
class RequiredTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @var Email
	 */
	protected $object;

	protected function setUp()
	{
		$this->object = new Required;
	}

	/**
	 * @coversDefaultClass __construct
	 * @coversDefaultClass getMessage
	 * @group              Validation
	 */
	public function testGetMessage()
	{
		$this->assertEquals(
			'The field is required and has not been specified.',
			$this->object->getMessage()
		);
	}

	/**
	 * @coversDefaultClass validate
	 * @dataProvider       validateProvider
	 * @group              Validation
	 */
	public function testValidate($value, $field, $expected, $data)
	{
		$this->assertEquals(
			$expected,
			$this->object->validate($value, $field, $data)
		);
	}

	/**
	 * Provides sample data for testing the email validation
	 *
	 * @return array
	 */
	public function validateProvider()
	{
		return array(
			0 => array('admin@test.com', null, true, null),
			1 => array('', null, false, null),
			2 => array(array(), null, false, null),
			3 => array(null, null, false, null),
			4 => array(false, null, false, null),

			5 => array('test string', 'test', false,
				array()
			),

			6 => array('test string', 'test', false,
				array(
					'foo' => 'bar',
					'baz' => 'bat',
				)
			),

			7 => array('test string', 'test', true,
				array(
					'foo' => 'bar',
					'test' => 'value',
					'baz' => 'bat',
				)
			),

			8 => array('bla', 'test', true, null),
			9 => array('', 'test', false, null),
			10 => array('bla', null, true, array()),
			11 => array('', null, false, array()),
		);
	}

}
