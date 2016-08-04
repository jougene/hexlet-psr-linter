<?php
namespace HexletPsrLinter;

use PhpParser\Error;
use PhpParser\ParserFactory;
use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter;
use HexletPsrLinter\NodeVisitor;

/**
 * Test User class
 */
class Linter
{
    public function lint(string $code) : bool
    {
        array_map(function ($item) {
            if (!$this->isCamelCase($item)) {
                exit("There are errors in your code!" . PHP_EOL);
            }
        }, $this->getFunctionsNames($code));
        return true;
    }

    public static function isCamelCase(string $string) : bool
    {
        return \PHP_CodeSniffer::isCamelCaps($string);
    }

    public function getFunctionsNames(String $code)
    {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $traverser = new NodeTraverser;

        $nodeVisitor = new NodeVisitor;
        $traverser->addVisitor($nodeVisitor);
        try {
            $nodes = $parser->parse($code);
            $nodes = $traverser->traverse($nodes);
        } catch (Error $e) {
            echo 'Parse Error: ', $e->getMessage();
        }

        return $nodeVisitor->getFunctionsNames();
    }
}
