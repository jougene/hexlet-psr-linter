<?php
namespace HexletPsrLinter\Rules;

function isCamelCase(string $string) : bool
{
    return \PHP_CodeSniffer::isCamelCaps($string);
}

function isSomeRule() : bool
{
    return true;
}
