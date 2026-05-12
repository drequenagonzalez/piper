<?php

namespace Spatie\Piper\Arr;

use Closure;
use InvalidArgumentException;

function split(int $numberOfGroups): Closure
{
    return function (array $items) use ($numberOfGroups): array {
        if ($numberOfGroups < 1) {
            throw new InvalidArgumentException('Number of groups must be at least 1.');
        }

        if ($items === []) {
            return [];
        }

        $groups = [];
        $groupSize = intdiv(\count($items), $numberOfGroups);
        $remain = \count($items) % $numberOfGroups;
        $start = 0;

        for ($i = 0; $i < $numberOfGroups; $i++) {
            $size = $groupSize + ($i < $remain ? 1 : 0);

            if ($size > 0) {
                $groups[] = array_slice($items, $start, $size);
                $start += $size;
            }
        }

        return $groups;
    };
}
