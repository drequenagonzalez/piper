<?php

use function Spatie\Piper\Str\toBoolean;

it('casts strings to booleans', function () {
    expect('true' |> toBoolean())->toBeTrue();
    expect('false' |> toBoolean())->toBeFalse();
});
