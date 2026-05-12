<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\operatorForWhere;

function firstWhere(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): mixed {
        return $items |> first(operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments)));
    };
}
