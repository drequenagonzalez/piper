<?php

namespace Spatie\Piper;

function fromJson(string $json, int $depth = 512, int $flags = 0): array
{
    return Support::normalize(json_decode($json, true, $depth, $flags));
}
