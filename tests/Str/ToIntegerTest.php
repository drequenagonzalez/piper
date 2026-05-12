<?php

use function Spatie\Piper\Str\toInteger;

it('casts strings to integers', function () {
    expect('42' |> toInteger())->toBe(42);
});
