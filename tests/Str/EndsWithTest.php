<?php

use function Spatie\Piper\Str\endsWith;

it('checks whether a string ends with a needle', function () {
    expect('Laravel' |> endsWith('vel'))->toBeTrue();
    expect('Laravel' |> endsWith(['vel', 'fony']))->toBeTrue();
    expect('Laravel' |> endsWith('fony'))->toBeFalse();
});
