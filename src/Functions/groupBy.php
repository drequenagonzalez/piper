<?php

namespace Spatie\Piper;

use Closure;
use Stringable;

function groupBy(mixed $groupBy, bool $preserveKeys = false): Closure
{
    return function (array $items) use ($groupBy, $preserveKeys): array {
        $nextGroups = [];

        if (! Support::useAsCallable($groupBy) && is_array($groupBy)) {
            $nextGroups = $groupBy;
            $groupBy = array_shift($nextGroups);
        }

        $callback = Support::valueRetriever($groupBy);
        $results = [];

        foreach ($items as $key => $item) {
            $groupKeys = $callback($item, $key);
            $groupKeys = is_array($groupKeys) ? $groupKeys : [$groupKeys];

            foreach ($groupKeys as $groupKey) {
                $groupKey = Support::enumValue($groupKey);
                $groupKey = is_bool($groupKey) ? (int) $groupKey : ($groupKey instanceof Stringable || $groupKey === null ? (string) $groupKey : $groupKey);

                if ($preserveKeys) {
                    $results[$groupKey][$key] = $item;
                } else {
                    $results[$groupKey][] = $item;
                }
            }
        }

        if ($nextGroups !== []) {
            foreach ($results as $key => $group) {
                $results[$key] = ($group |> groupBy($nextGroups, $preserveKeys));
            }
        }

        return $results;
    };
}
