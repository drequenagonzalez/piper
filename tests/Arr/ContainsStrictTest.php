<?php

use function Spatie\Piper\Arr\containsStrict;

it('checks whether the array contains a strict value', function () {
    expect(['name' => 'Taylor', 'age' => 40] |> containsStrict('40'))->toBeFalse();
    expect(['name' => 'Taylor', 'age' => 40] |> containsStrict(40))->toBeTrue();
});
