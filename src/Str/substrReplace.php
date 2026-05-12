<?php

namespace Spatie\Piper\Str;

use Closure;

function substrReplace(string|array $replace, int|array $offset = 0, int|array|null $length = null): Closure
{
    return fn (string|array $string): string|array => \substr_replace($string, $replace, $offset, $length);
}
