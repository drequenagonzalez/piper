<?php

namespace Spatie\Piper\Str;

use Closure;

function toBoolean(): Closure
{
    return fn (string $string): bool => filter_var($string, FILTER_VALIDATE_BOOLEAN);
}
