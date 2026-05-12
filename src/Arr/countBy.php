<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\enumValue;
use function Spatie\Piper\Support\valueRetriever;

function countBy(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): array {
        $callback = $callback === null ? fn (mixed $value): mixed => $value : valueRetriever($callback);
        $counts = [];

        foreach ($items as $key => $item) {
            $group = $callback($item, $key);
            $group = enumValue($group);
            $group = is_bool($group) ? (int) $group : (string) $group;
            $counts[$group] = ($counts[$group] ?? 0) + 1;
        }

        return $counts;
    };
}
