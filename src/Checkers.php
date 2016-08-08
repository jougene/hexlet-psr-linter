<?php
namespace HexletPsrLinter;

function isCamelCase(string $string) : bool
{
    return \PHP_CodeSniffer::isCamelCaps($string);
}
