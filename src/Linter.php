<?php
namespace HexletPsrLinter;

use PhpParser\Error;
use PhpParser\ParserFactory;
use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter;
use HexletPsrLinter\NodeVisitor;
use function \HexletPsrLinter\Checkers\Checker\getCheckers;
use function \HexletPsrLinter\Checkers\FunctionNaming\checkFunctionsNaming;

/**
 * Test User class
 */
class Linter
{
    private $errors = [];

    public function lint(string $code) : bool
    {
        return checkFunctionsNaming();
    }

    public static function getFunctions(String $code)
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

        return $nodeVisitor->getFunctions();
    }
}

// 'Line ' . $function['lineNumber'] . ': Method ' . $function['funcName'] . ' should be declared in CamelCase';
