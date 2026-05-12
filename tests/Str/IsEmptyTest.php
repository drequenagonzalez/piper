<?php

use function Spatie\Piper\Str\isEmpty;

it('checks whether the string is empty', function () {
    expect('' |> isEmpty())->toBeTrue();
    expect('Laravel' |> isEmpty())->toBeFalse();
});
