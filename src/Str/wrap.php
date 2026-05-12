<?php

namespace Spatie\Piper\Str;

use Closure;

function wrap(string $before, ?string $after = null): Closure
{
    return fn (string $value): string => $before.$value.($after ?? $before);
}
