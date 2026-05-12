<?php

namespace Spatie\Piper\Arr;

use Closure;

function whereNull(mixed $key = null): Closure
{
    return function (array $items) use ($key): array {
        return $items |> where($key, '===', null);
    };
}
