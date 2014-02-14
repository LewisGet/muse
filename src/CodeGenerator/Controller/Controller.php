<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Controller;

use CodeGenerator\DI\Container;
use CodeGenerator\IO\IOInterface;
use Joomla\Input;

/**
 * CodeGenerator Controller.
 */
abstract class Controller implements ControllerInterface
{
	/**
	 * IO adapter.
	 *
	 * @var
	 */
	protected $io;

	/**
	 * Instantiate the controller.
	 *
	 * @param   IOInterface  $io  The Controller object.
	 */
	public function __construct(IOInterface $io)
	{
		// Setup dependencies.
		$this->io = $io;
	}

	/**
	 * Write a string to standard output.
	 *
	 * @param   string   $text  The text to display.
	 *
	 * @return  Controller  Instance of $this to allow chaining.
	 */
	public function out($text = '')
	{
		$this->io->out($text);

		return $this;
	}

	/**
	 * Write a string to standard error output.
	 *
	 * @param   string   $text  The text to display.
	 *
	 * @return  Controller  Instance of $this to allow chaining.
	 */
	public function err($text = '')
	{
		$this->io->err($text);

		return $this;
	}

	/**
	 * Get a value from standard input.
	 *
	 * @param   string  $question  The question you want to ask user.
	 *
	 * @return  string  The input string from standard input.
	 */
	public function in($question = '')
	{
		return $this->io->in($question);
	}

	/**
	 * close
	 *
	 * @param string $text
	 *
	 * @return  void
	 */
	public function close($text = '')
	{
		$this->io->close($text);
	}
}
