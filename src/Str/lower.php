<?php

namespace Spatie\Piper\Str;

use Closure;

function lower(): Closure
{
    return fn (string $value): string => mb_strtolower($value, 'UTF-8');
}
