<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Linter;

/**
 *
 */
class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function testLint()
    {
        $linter = new Linter($code);
        $code = file_get_contents('testfile.php');
        $errors = $linter->lint($code);
        $this->assertEquals($errors, []);
    }

    public function testIsCamelCase()
    {
        $string = 'myFunctionName';
        $string1 = 'my_function_name';
        $this->assertTrue(Linter::isCamelCase($string));
        $this->assertFalse(Linter::isCamelCase($string1));
    }
}
