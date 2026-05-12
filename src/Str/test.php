<?php

namespace Spatie\Piper\Str;

use Closure;

function test(string|array $pattern): Closure
{
    return fn (string $value): bool => $value |> isMatch($pattern);
}
