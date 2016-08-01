<?php

namespace HexletPsrLinter;

/**
 *
 */
class AppTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $source = '<?php echo "Hello, world"';
        $app = new App($source);
        $this->assertEquals(true, $app->validate($source));
    }
}
