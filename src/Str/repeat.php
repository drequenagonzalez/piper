<?php

namespace Spatie\Piper\Str;

use Closure;

function repeat(int $times): Closure
{
    return fn (string $string): string => str_repeat($string, $times);
}
