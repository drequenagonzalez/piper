<?php

namespace Spatie\Piper\Arr;

use Closure;

function uniqueStrict(callable|string|int|array|null $key = null): Closure
{
    return function (array $items) use ($key): array {
        return $items |> unique($key, true);
    };
}
