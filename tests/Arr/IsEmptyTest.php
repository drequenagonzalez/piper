<?php

use function Spatie\Piper\Arr\isEmpty;

it('checks whether the array is empty', function () {
    expect([] |> isEmpty())->toBeTrue();
    expect([1] |> isEmpty())->toBeFalse();
});
