<?php

use function Spatie\Piper\Str\position;

it('returns the position of a needle', function () {
    expect('Laravel' |> position('vel'))->toBe(4);
});

it('returns false when the needle is missing', function () {
    expect('Laravel' |> position('missing'))->toBeFalse();
});
