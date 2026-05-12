<?php

namespace Spatie\Piper\Support;

function dataSet(array &$target, string|int|array|null $key, mixed $value): void
{
    if ($key === null) {
        $target = $value;

        return;
    }

    $segments = is_array($key) ? $key : explode('.', (string) $key);
    $current = &$target;

    foreach ($segments as $segment) {
        if (! is_array($current)) {
            $current = [];
        }

        if (! array_key_exists($segment, $current)) {
            $current[$segment] = [];
        }

        $current = &$current[$segment];
    }

    $current = $value;
}
