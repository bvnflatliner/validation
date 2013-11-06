<?php
/**
 * @package   Fuel\Validation
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

namespace Fuel\Validation\Exception;

/**
 * Thrown when a specified field is invalid
 *
 * @package Fuel\Validation\Exception
 * @author  Fuel Development Team
 *
 * @since   2.0
 */
class InvalidField extends \InvalidArgumentException
{

	/**
	 * @param string     $message  This is expected to be left blank or be a field name
	 * @param int        $code
	 * @param \Exception $previous
	 *
	 * @since 2.0
	 */
	public function __construct($message = '', $code = 0, \Exception $previous = null)
	{
		if (empty($message))
		{
			$message = 'VAL-001: The specified field is not known.';
		}
		else
		{
			$message = 'VAL-002: The field ['.$message.'] is not known.';
		}

		parent::__construct($message, $code, $previous);
	}

}
