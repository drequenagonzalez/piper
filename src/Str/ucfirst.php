<?php

namespace Spatie\Piper\Str;

use Closure;

function ucfirst(): Closure
{
    return fn (string $string): string => mb_strtoupper(mb_substr($string, 0, 1, 'UTF-8'), 'UTF-8').mb_substr($string, 1, null, 'UTF-8');
}
