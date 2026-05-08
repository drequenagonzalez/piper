<?php

namespace Spatie\Piper;

use Closure;

function doesntContainStrict(mixed $key, mixed $value = null, bool $hasValue = false): Closure
{
    return function (array $items) use ($key, $value, $hasValue): bool {
        return ! ($items |> containsStrict($key, $value, $hasValue));
    };
}
