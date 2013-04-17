<?php
/**
 * PHP-DI
 *
 * @link      http://mnapoli.github.io/PHP-DI/
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace DI\Definition\FileLoader;

use DI\Definition\FileLoader\Exception\FileNotFoundException;
use DI\Definition\FileLoader\Exception\ParseException;

/**
 * DefinitionFileLoader is the abstract class used by all built-in loaders that are file based.
 *
 * @author Domenic Muskulus <domenic@muskulus.eu>
 */
abstract class DefinitionFileLoader
{

    /**
     * @var string
     */
    protected $definitionFile;

    /**
     * @var bool
     */
    protected $validateFile = false;

    /**
     * @param string $pathAndFilename
     * @param bool   $validateFile
     * @throws ParseException
     * @throws FileNotFoundException
     */
    public function __construct($pathAndFilename, $validateFile = true)
    {
        if (!file_exists($pathAndFilename)) {
            throw new FileNotFoundException("The definition file '$pathAndFilename' has not been found");
        } elseif (!is_readable($pathAndFilename)) {
            throw new ParseException("The definition file '$pathAndFilename' is not readable");
        }
        $this->definitionFile = $pathAndFilename;
        $this->validateFile = $validateFile;
    }

    /**
     * Enables or disables file validation.
     * Should only be enabled on in development environments due to its performance impact.
     * By default it is disabled.
     *
     * @param boolean $validateFile
     */
    public function validateFile($validateFile)
    {
        $this->validateFile = $validateFile;
    }

    /**
     * Loads the definitions from a definition file
     *
     * @throws ParseException
     * @return array
     */
    abstract public function load();

}
