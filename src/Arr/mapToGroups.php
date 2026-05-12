<?php

namespace Spatie\Piper\Arr;

use Closure;

function mapToGroups(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        return ($items |> mapToDictionary($callback)) |> map(fn (array $group): array => $group);
    };
}
