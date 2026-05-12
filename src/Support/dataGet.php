<?php

namespace Spatie\Piper\Support;

use ArrayAccess;

function dataGet(mixed $target, string|int|array|null $key, mixed $default = null): mixed
{
    if ($key === null) {
        return $target;
    }

    $segments = is_array($key) ? $key : explode('.', (string) $key);

    foreach ($segments as $index => $segment) {
        if ($segment === '*') {
            if (! is_iterable($target)) {
                return evaluate($default);
            }

            $result = [];
            $remaining = array_slice($segments, $index + 1);

            foreach ($target as $item) {
                $value = dataGet($item, $remaining, $default);

                if (is_array($value)) {
                    $result = array_merge($result, $value);
                } else {
                    $result[] = $value;
                }
            }

            return $result;
        }

        if (is_array($target) && array_key_exists($segment, $target)) {
            $target = $target[$segment];

            continue;
        }

        if ($target instanceof ArrayAccess && $target->offsetExists($segment)) {
            $target = $target[$segment];

            continue;
        }

        if (is_object($target) && isset($target->{$segment})) {
            $target = $target->{$segment};

            continue;
        }

        return evaluate($default);
    }

    return $target;
}
