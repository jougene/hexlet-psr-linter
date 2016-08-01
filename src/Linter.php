<?php
namespace HexletPsrLinter;

/**
 * Test User class
 */
class Linter
{
    private $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function lint()
    {
        return true;
    }
}
