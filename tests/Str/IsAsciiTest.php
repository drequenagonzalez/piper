<?php

use function Spatie\Piper\Str\isAscii;

it('checks whether a string contains only ascii characters', function () {
    expect('abc' |> isAscii())->toBeTrue();
    expect('ü' |> isAscii())->toBeFalse();
});
