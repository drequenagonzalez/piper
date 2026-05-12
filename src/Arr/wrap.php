<?php

namespace Spatie\Piper\Arr;

function wrap(mixed $value): array
{
    if ($value === null) {
        return [];
    }

    return is_array($value) ? $value : [$value];
}
