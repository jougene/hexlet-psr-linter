<?php

namespace HexletPsrLinter;

use HexletPsrLinter\App;

/**
 *
 */
class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $code = '<?php echo "Hello, world"';
        $linter = new Linter($code);
        $this->assertTrue(true, $linter->lint($code));
    }
}
