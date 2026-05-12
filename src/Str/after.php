<?php

namespace Spatie\Piper\Str;

use Closure;

function after(string $search): Closure
{
    return fn (string $subject): string => $search === ''
        ? $subject
        : array_reverse(\explode($search, $subject, 2))[0];
}
