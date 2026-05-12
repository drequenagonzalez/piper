<?php

use function Spatie\Piper\Str\swap;

it('swaps multiple values in a string', function () {
    expect('framework' |> swap(['frame' => 'pipe', 'work' => 'line']))->toBe('pipeline');
});
