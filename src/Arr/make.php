<?php

namespace Spatie\Piper\Arr;

use function Spatie\Piper\Support\normalize;

function make(mixed $items = []): array
{
    return normalize($items);
}
