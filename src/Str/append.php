<?php

namespace Spatie\Piper\Str;

use Closure;

function append(string ...$values): Closure
{
    return fn (string $string): string => $string.implode('', $values);
}
