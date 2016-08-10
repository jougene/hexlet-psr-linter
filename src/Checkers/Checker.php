<?php
namespace HexletPsrLinter\Checkers\Checker;

function getCheckers()
{
    return [
        'isCamelCase' => function (string $string) {
            return \PHP_CodeSniffer::isCamelCaps($string);
        },
        'isSomeRule' => function (string $string) {
            return true;
        },
        'isAnotherRule' => function (string $string) {
            return true;
        }
    ];
}
