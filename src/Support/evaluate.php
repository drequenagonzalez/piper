<?php

namespace Spatie\Piper\Support;

use Closure;

function evaluate(mixed $value, mixed ...$args): mixed
{
    return $value instanceof Closure ? $value(...$args) : $value;
}
