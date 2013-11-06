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

use Fuel\Validation\AbstractRule;

/**
 * Checks that the given field exists
 *
 * @package Fuel\Validation\Rule
 * @author  Fuel Development Team
 *
 * @since   2.0
 */
class Required extends AbstractRule
{


	/**
	 * @param mixed  $params
	 * @param string $message
	 *
	 * @since 2.0
	 */
	public function __construct($params = null, $message = '')
	{
		parent::__construct($params, $message);

		if ($message == '')
		{
			$this->setMessage('The field is required and has not been specified.');
		}
	}

	/**
	 * @param mixed $value
	 * @param null  $field
	 * @param null  $allFields
	 *
	 * @return bool
	 *
	 * @since 2.0
	 */
	public function validate($value, $field = null, &$allFields = null)
	{
		// Make sure the array key exists in the data
		// This check will only be performed if $field and $allFields are set. Else only the value passed will be tested
		if ( ( ! is_null($field) and ! is_null($allFields) ) and
			! array_key_exists($field, $allFields)
		)
		{
			return false;
		}

		return ! ($value === false or
			$value === null or
			$value === '' or
			$value === array()
		);
	}
}
