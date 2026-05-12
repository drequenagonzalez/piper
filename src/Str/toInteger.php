<?php

namespace Spatie\Piper\Str;

use Closure;

function toInteger(): Closure
{
    return fn (string $string): int => (int) $string;
}
