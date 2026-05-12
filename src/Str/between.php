<?php

namespace Spatie\Piper\Str;

use Closure;

function between(string $from, string $to): Closure
{
    return fn (string $subject): string => $subject |> after($from) |> beforeLast($to);
}
