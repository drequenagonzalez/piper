<?php

namespace Spatie\Piper\Str;

use Closure;

function toString(): Closure
{
    return fn (string $string): string => $string;
}
