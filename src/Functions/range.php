<?php

namespace Spatie\Piper;

function range(int $from, int $to, int $step = 1): array
{
    return \range($from, $to, $step);
}
