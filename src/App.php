<?php
namespace HexletPsrLinter;

/**
 * Test User class
 */
class App
{
    private $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function validate()
    {
        return true;
    }
}
