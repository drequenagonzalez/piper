<?php

namespace Spatie\Piper\Str;

use Closure;

function deduplicate(string $character = ' '): Closure
{
    return fn (string $value): string => preg_replace('/'.preg_quote($character, '/').'+/u', $character, $value);
}
