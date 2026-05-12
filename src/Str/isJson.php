<?php

namespace Spatie\Piper\Str;

use Closure;

function isJson(): Closure
{
    return fn (string $value): bool => json_validate($value);
}
