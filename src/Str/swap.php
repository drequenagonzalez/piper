<?php

namespace Spatie\Piper\Str;

use Closure;

function swap(array $map): Closure
{
    return fn (string $subject): string => strtr($subject, $map);
}
