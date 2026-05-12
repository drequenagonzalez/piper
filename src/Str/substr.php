<?php

namespace Spatie\Piper\Str;

use Closure;

function substr(int $start, ?int $length = null, string $encoding = 'UTF-8'): Closure
{
    return fn (string $string): string => mb_substr($string, $start, $length, $encoding);
}
