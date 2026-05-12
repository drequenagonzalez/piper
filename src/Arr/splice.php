<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function splice(int $offset, ?int $length = null, mixed $replacement = []): Closure
{
    return function (array $items) use ($offset, $length, $replacement): array {
        return array_splice($items, $offset, $length, normalize($replacement));
    };
}
