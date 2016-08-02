<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Linter;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class LinterTest extends TestCase
{
    public function testLint()
    {
        $code = file_get_contents('testfile.php');
        $linter = new Linter($code);
        $this->assertTrue($linter->lint($code));
    }

    public function testIsCamelCase()
    {
        $string = 'myFunctionName';
        $string1 = 'my_function_name';
        $this->assertTrue(Linter::isCamelCase($string));
        $this->assertFalse(Linter::isCamelCase($string1));
        $this->assertTrue(Linter::isCamelCase($string1));
    }
}
// E:\my\hexlet-psr-linter\testfile.php
