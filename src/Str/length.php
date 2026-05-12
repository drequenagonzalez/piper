<?php

namespace Spatie\Piper\Str;

use Closure;

function length(?string $encoding = 'UTF-8'): Closure
{
    return fn (string $value): int => mb_strlen($value, $encoding);
}
