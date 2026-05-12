<?php

namespace Spatie\Piper\Str;

use Closure;

function toFloat(): Closure
{
    return fn (string $string): float => (float) $string;
}
