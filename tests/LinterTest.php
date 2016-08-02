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
        $code = '<?php echo "Hello, world"';
        $linter = new Linter($code);
        $this->assertTrue($linter->lint($code));
    }

    public function testIsCamelCase()
    {
        $string = 'myFunctionName';
        $string1 = 'my_function_name';
        $this->assertTrue(Linter::isCamelCase($string));
        $this->assertFalse(Linter::isCamelCase($string1));
    }
}
