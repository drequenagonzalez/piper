<?php

namespace Spatie\Piper\Arr;

use Closure;

function some(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): bool {
        return $items |> contains(...$arguments);
    };
}
