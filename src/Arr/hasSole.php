<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\operatorForWhere;

function hasSole(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): bool {
        $filtered = $arguments === [] || $arguments[0] === null ? $items : ($items |> filter(\count($arguments) > 1 ? operatorForWhere($arguments[0], $arguments[1], $arguments[2] ?? null, \count($arguments)) : $arguments[0]));

        return \count($filtered) === 1;
    };
}
