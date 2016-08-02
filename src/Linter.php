<?php
namespace HexletPsrLinter;

use PhpParser\Error;
use PhpParser\ParserFactory;

/**
 * Test User class
 */
class Linter
{
    public function lint(string $code) : bool
    {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

        return true;
    }

    public static function isCamelCase(string $string)
    {
        return true;
    }
}
