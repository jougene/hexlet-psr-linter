<?php
namespace HexletPsrLinter;

use PhpParser\Error;
use PhpParser\ParserFactory;
use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter;
use HexletPsrLinter\NodeVisitor;
use function \HexletPsrLinter\Rules\isCamelCase;
use function \HexletPsrLinter\Rules\isSomeRule;

/**
 * Test User class
 */
class Linter
{
    private $errors = [];
    private $rules = [];

    public function lint(string $code)
    {
        $functionsList = $this->getFunctions($code);

        foreach ($functionsList as $function) {
            if (!isCamelCase($function['funcName'])) {
                $this->errors[] = 'Line ' . $function['lineNumber'] . ': Method ' . $function['funcName'] . ' should be declared in CamelCase';
            }
        }
        return $this->errors;
    }

    public function getFunctions(String $code)
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
