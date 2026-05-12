<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\operatorForWhere;

function hasSole(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): bool {
        if ($arguments === [] || $arguments[0] === null) {
            return \count($items) === 1;
        }

        $filtered = $items |> filter(operatorForWhere(
            $arguments[0],
            $arguments[1] ?? null,
            $arguments[2] ?? null,
            \count($arguments),
        ));

        return \count($filtered) === 1;
    };
}
