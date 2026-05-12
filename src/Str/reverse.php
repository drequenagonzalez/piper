<?php

namespace Spatie\Piper\Str;

use Closure;

function reverse(): Closure
{
    return fn (string $value): string => implode('', array_reverse(mb_str_split($value)));
}
