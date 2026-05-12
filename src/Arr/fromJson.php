<?php

namespace Spatie\Piper\Arr;

use function Spatie\Piper\Support\normalize;

function fromJson(string $json, int $depth = 512, int $flags = 0): array
{
    return normalize(json_decode($json, true, $depth, $flags));
}
