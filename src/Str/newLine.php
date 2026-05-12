<?php

namespace Spatie\Piper\Str;

use Closure;

function newLine(int $count = 1): Closure
{
    return fn (string $value): string => $value.str_repeat(PHP_EOL, $count);
}
