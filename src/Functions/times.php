<?php

namespace Spatie\Piper;

function times(int $number, ?callable $callback = null): array
{
    if ($number < 1) {
        return [];
    }

    $items = range(1, $number);

    return $callback === null ? $items : ($items |> map(fn (int $number): mixed => $callback($number)));
}
