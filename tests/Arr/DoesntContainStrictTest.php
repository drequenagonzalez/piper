<?php

use function Spatie\Piper\Arr\doesntContainStrict;

it('checks whether the array does not contain a strict value', function () {
    expect(['1', 2] |> doesntContainStrict(1))->toBeTrue();
    expect(['1', 2] |> doesntContainStrict('1'))->toBeFalse();
});
