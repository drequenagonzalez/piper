<?php

use function Spatie\Piper\Arr\hasSole;

it('checks whether exactly one value exists', function () {
    expect([10] |> hasSole())->toBeTrue();
    expect([10, 20] |> hasSole())->toBeFalse();
});
