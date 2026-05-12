<?php

namespace Spatie\Piper\Str;

use Closure;

function scan(string $format): Closure
{
    return fn (string $string): array => sscanf($string, $format);
}
