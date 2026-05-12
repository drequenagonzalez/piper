<?php

namespace Spatie\Piper\Str;

use Closure;

function upper(): Closure
{
    return fn (string $value): string => mb_strtoupper($value, 'UTF-8');
}
