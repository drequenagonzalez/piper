<?php

namespace Spatie\Piper\Str;

use Closure;

function squish(): Closure
{
    return fn (string $value): string => preg_replace('~(\s|\x{3164}|\x{1160})+~u', ' ', ($value |> trim()));
}
