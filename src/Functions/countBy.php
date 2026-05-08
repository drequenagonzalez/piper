<?php

namespace Spatie\Piper;

use Closure;

function countBy(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): array {
        $callback = $callback === null ? fn (mixed $value): mixed => $value : Support::valueRetriever($callback);
        $counts = [];

        foreach ($items as $key => $item) {
            $group = $callback($item, $key);
            $group = Support::enumValue($group);
            $group = is_bool($group) ? (int) $group : (string) $group;
            $counts[$group] = ($counts[$group] ?? 0) + 1;
        }

        return $counts;
    };
}
