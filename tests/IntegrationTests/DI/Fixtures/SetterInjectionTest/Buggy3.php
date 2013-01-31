<?php
/**
 * PHP-DI
 *
 * @link      http://mnapoli.github.com/PHP-DI/
 * @copyright 2012 Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace IntegrationTests\DI\Fixtures\SetterInjectionTest;

use DI\Annotations\Inject;

/**
 * Fixture class
 */
class Buggy3 {

	/**
	 * @Inject(name="nonExistentBean")
	 * @param $dependency
	 */
	public function setDependency($dependency) {
	}

}