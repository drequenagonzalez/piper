<?php

use function Spatie\Piper\Str\toFloat;

it('casts strings to floats', function () {
    expect('12.5' |> toFloat())->toBe(12.5);
});
