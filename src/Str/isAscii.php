<?php

namespace Spatie\Piper\Str;

use Closure;

function isAscii(): Closure
{
    return fn (string $value): bool => ! preg_match('/[^\x00-\x7F]/', $value);
}
