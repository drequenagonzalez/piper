<?php

namespace Spatie\Piper\Str;

use Closure;

function isNotEmpty(): Closure
{
    return fn (string $value): bool => $value !== '';
}
