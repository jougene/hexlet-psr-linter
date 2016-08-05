<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class NodeVisitor extends NodeVisitorAbstract
{
    private $functions = [];

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Stmt\Function_ || $node instanceof Node\Stmt\ClassMethod) {
            $this->functions[] = [
                'funcName'      => $node->name,
                'lineNumber'    => $node->getAttribute('startLine')
            ];
        }
    }

    public function getFunctions()
    {
        return $this->functions;
    }
}
