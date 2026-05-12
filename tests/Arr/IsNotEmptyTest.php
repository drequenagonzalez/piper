<?php

use function Spatie\Piper\Arr\isNotEmpty;

it('checks whether the array is not empty', function () {
    expect([1] |> isNotEmpty())->toBeTrue();
    expect([] |> isNotEmpty())->toBeFalse();
});
