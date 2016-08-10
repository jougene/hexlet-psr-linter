<?php
namespace HexletPsrLinter\Checkers\FunctionNaming;

use HexletPsrLinter\Linter;
use function \HexletPsrLinter\Checkers\Checker\getCheckers;

function checkFunctionsNaming() : bool
{
    //TODO way to get source code can differentiate
    // so do
    $code = file_get_contents(__DIR__ . '/../../tests/fixtures/wrongtestfile.php');
    $functionsList = Linter::getFunctions($code);
    $checkers = getCheckers();

    foreach ($checkers as $checker) {
        foreach ($functionsList as $function) {
            if ($checker($function['funcName'])) {
                return true;
            }
        }
    }
    return false;
}
