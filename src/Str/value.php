<?php

namespace Spatie\Piper\Str;

use Closure;

function value(): Closure
{
    return fn (string $string): string => $string;
}
