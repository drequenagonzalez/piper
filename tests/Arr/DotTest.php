<?php

use function Spatie\Piper\Arr\dot;

it('flattens nested arrays using dot notation', function () {
    expect(['user' => ['name' => 'Taylor']] |> dot())->toBe(['user.name' => 'Taylor']);
});
