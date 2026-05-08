<?php

namespace Spatie\Piper;

use Closure;

function whereStrict(mixed $key, mixed $value): Closure
{
    return function (array $items) use ($key, $value): array {
        return $items |> where($key, '===', $value);
    };
}
