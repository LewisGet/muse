<?php
/**
 * Part of code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace AcmeTemplate\Task;

use AcmeTemplate\AcmeController;
use AcmeTemplate\Action;
use CodeGenerator\IO\IOInterface;
use Joomla\Registry\Registry;

/**
 * Class AcmeController
 *
 * @since 1.0
 */
class Convert extends AcmeController
{
	/**
	 * Constructor.
	 *
	 * @param IOInterface $io
	 * @param Registry    $config
	 */
	public function __construct(IOInterface $io, Registry $config = null)
	{
		parent::__construct($io, $config);
	}

	/**
	 * Execute the controller.
	 *
	 * @return  boolean  True if controller finished execution, false if the controller did not
	 *                   finish execution. A controller might return false if some precondition for
	 *                   the controller to run has not been satisfied.
	 *
	 * @since   1.0
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function execute()
	{
		// Flip src & dest
		$dest = $this->config['path.src'];
		$src  = $this->config['path.dest'];

		$this->config['path.src']  = $src;
		$this->config['path.dest'] = $dest;

		// Flip replace array
		$this->replace = array_flip($this->replace);

		$this->doAction(new Action\ConvertAction);
	}
}