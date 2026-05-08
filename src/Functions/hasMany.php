<?php

namespace Spatie\Piper;

use Closure;

function hasMany(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): bool {
        $filtered = $arguments === [] || $arguments[0] === null ? $items : ($items |> filter(\count($arguments) > 1 ? Support::operatorForWhere($arguments[0], $arguments[1], $arguments[2] ?? null, \count($arguments)) : $arguments[0]));

        return \count(($filtered |> take(2))) === 2;
    };
}
