<?php

namespace Spatie\Piper\Arr;

use Closure;

function forPage(int $page, int $perPage): Closure
{
    return function (array $items) use ($page, $perPage): array {
        return $items |> slice(\max(0, ($page - 1) * $perPage), $perPage);
    };
}
