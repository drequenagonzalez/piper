<?php

namespace Spatie\Piper\Arr;

use Closure;

function mode(string|int|array|null $key = null): Closure
{
    return function (array $items) use ($key): ?array {
        if ($items === []) {
            return null;
        }

        $values = $key === null ? $items : ($items |> pluck($key));
        $counts = [];

        foreach ($values as $value) {
            $counts[$value] = ($counts[$value] ?? 0) + 1;
        }

        asort($counts);
        $highest = end($counts);

        return array_keys(($counts |> filter(fn (int $count): bool => $count == $highest)));
    };
}
