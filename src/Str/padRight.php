<?php

namespace Spatie\Piper\Str;

use Closure;

function padRight(int $length, string $pad = ' '): Closure
{
    return fn (string $value): string => str_pad($value, $length, $pad, STR_PAD_RIGHT);
}
