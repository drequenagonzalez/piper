<?php

use function Spatie\Piper\Str\isNotEmpty;

it('checks whether the string is not empty', function () {
    expect('Laravel' |> isNotEmpty())->toBeTrue();
    expect('' |> isNotEmpty())->toBeFalse();
});
