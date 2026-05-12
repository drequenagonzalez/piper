<?php

namespace Spatie\Piper\Support;

use ArrayAccess;

function dataHas(mixed $target, string|int|array|null $key): bool
{
    if ($key === null) {
        return true;
    }

    $segments = is_array($key) ? $key : explode('.', (string) $key);

    foreach ($segments as $segment) {
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

        return false;
    }

    return true;
}
