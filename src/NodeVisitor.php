<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class NodeVisitor extends NodeVisitorAbstract
{
    private $functionsNames = [];

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Stmt\Function_ || $node instanceof Node\Stmt\ClassMethod) {
            $this->functionsNames[] = $node->name;
        }
    }

    public function getFunctionsNames()
    {
        return $this->functionsNames;
    }
}
