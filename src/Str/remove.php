<?php

namespace Spatie\Piper\Str;

use Closure;

function remove(string|iterable $search, bool $caseSensitive = true): Closure
{
    return fn (string $subject): string => $subject |> replace($search, '', $caseSensitive);
}
