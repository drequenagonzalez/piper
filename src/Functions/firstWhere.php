<?php

namespace Spatie\Piper;

use Closure;

function firstWhere(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): mixed {
        return $items |> first(Support::operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments)));
    };
}
