<?php

namespace Spatie\Piper;

function make(mixed $items = []): array
{
    return Support::normalize($items);
}
