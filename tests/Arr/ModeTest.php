<?php

use function Spatie\Piper\Arr\mode;

it('returns the most common values', function () {
    expect([1, 1, 2, 2, 3] |> mode())->toBe([1, 2]);
});
