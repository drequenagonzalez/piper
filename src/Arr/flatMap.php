<?php

namespace Spatie\Piper\Arr;

use Closure;

function flatMap(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        return ($items |> map($callback)) |> collapse();
    };
}
