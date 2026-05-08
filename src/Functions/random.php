<?php

namespace Spatie\Piper;

use Closure;
use InvalidArgumentException;

function random(callable|int|null $number = null, bool $preserveKeys = false): Closure
{
    return function (array $items) use ($number, $preserveKeys): mixed {
        if ($items === []) {
            throw new InvalidArgumentException('Cannot select random item from an empty array.');
        }

        if ($number === null) {
            return $items[array_rand($items)];
        }

        $count = is_callable($number) ? $number($items) : $number;

        if ($count < 1 || $count > \count($items)) {
            throw new InvalidArgumentException('Requested random item count is invalid.');
        }

        $keys = (array) array_rand($items, $count);
        $result = [];

        foreach ($keys as $key) {
            if ($preserveKeys) {
                $result[$key] = $items[$key];
            } else {
                $result[] = $items[$key];
            }
        }

        return $result;
    };
}
