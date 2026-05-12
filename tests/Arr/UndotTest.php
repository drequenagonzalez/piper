<?php

use function Spatie\Piper\Arr\undot;

it('expands dot notation keys into nested arrays', function () {
    expect(['user.name' => 'Taylor'] |> undot())->toBe(['user' => ['name' => 'Taylor']]);
});
