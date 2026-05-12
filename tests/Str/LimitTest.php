<?php

use function Spatie\Piper\Str\limit;

it('limits strings to a maximum length', function () {
    expect('The Laravel framework' |> limit(11))->toBe('The Laravel...');
});
