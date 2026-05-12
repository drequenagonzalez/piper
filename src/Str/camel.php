<?php

namespace Spatie\Piper\Str;

use Closure;

function camel(): Closure
{
    return fn (string $value): string => ($value |> studly()) |> lcfirst();
}
