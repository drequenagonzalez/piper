<?php

namespace Spatie\Piper\Str;

use Closure;

function isUlid(): Closure
{
    return fn (string $value): bool => preg_match('/^[0-7][0-9A-HJKMNP-TV-Z]{25}$/i', $value) === 1;
}
