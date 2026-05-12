<?php

namespace Spatie\Piper\Str;

use Closure;

function betweenFirst(string $from, string $to): Closure
{
    return fn (string $subject): string => $subject |> after($from) |> before($to);
}
