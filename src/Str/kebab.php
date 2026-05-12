<?php

namespace Spatie\Piper\Str;

use Closure;

function kebab(): Closure
{
    return fn (string $value): string => $value |> snake('-');
}
