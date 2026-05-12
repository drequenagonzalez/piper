<?php

namespace Spatie\Piper\Str;

use Closure;

function numbers(): Closure
{
    return fn (string $value): string => preg_replace('/[^0-9]/', '', $value);
}
