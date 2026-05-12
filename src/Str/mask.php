<?php

namespace Spatie\Piper\Str;

use Closure;

function mask(string $character, int $index, ?int $length = null, string $encoding = 'UTF-8'): Closure
{
    return function (string $string) use ($character, $index, $length, $encoding): string {
        $stringLength = mb_strlen($string, $encoding);

        if ($index < 0) {
            $index = max($index + $stringLength, 0);
        }

        $length ??= $stringLength - $index;

        if ($length < 0) {
            $length = max(($stringLength - $index) + $length, 0);
        }

        return mb_substr($string, 0, $index, $encoding)
            .str_repeat($character, $length)
            .mb_substr($string, $index + $length, null, $encoding);
    };
}
