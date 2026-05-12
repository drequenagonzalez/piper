<?php

namespace Spatie\Piper\Str;

use Closure;

function prepend(string ...$values): Closure
{
    return fn (string $string): string => implode('', $values).$string;
}
