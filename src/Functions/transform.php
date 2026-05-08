<?php

namespace Spatie\Piper;

use Closure;

function transform(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        return $items |> map($callback);
    };
}
