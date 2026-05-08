<?php

namespace Spatie\Piper;

use Closure;

function splice(int $offset, ?int $length = null, mixed $replacement = []): Closure
{
    return function (array $items) use ($offset, $length, $replacement): array {
        return array_splice($items, $offset, $length, Support::normalize($replacement));
    };
}
