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
        array_map(function ($item) {
            if ($this->isCamelCase($item)) {
                return false;
            }
        }, $this->getFunctionNames($code));
        return true;
    }

    public static function isCamelCase(string $string) : bool
    {
        return \PHP_CodeSniffer::isCamelCaps($string);
    }

    public function getFunctionNames(String $code)
    {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

        try {
            $stmts = $parser->parse($code);
        } catch (Error $e) {
            echo 'Parse Error: ', $e->getMessage();
        }

        $functions = array_filter($stmts, function ($item) {
            return (get_class($item) == 'PhpParser\Node\Stmt\Function_');
        });
        return array_map(function ($item) {
            return $item->name;
        }, $functions);
    }
}
