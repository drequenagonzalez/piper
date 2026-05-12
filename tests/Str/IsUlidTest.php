<?php

use function Spatie\Piper\Str\isUlid;

it('checks whether a string is a ulid', function () {
    expect('01ARZ3NDEKTSV4RRFFQ69G5FAV' |> isUlid())->toBeTrue();
    expect('not-a-ulid' |> isUlid())->toBeFalse();
});
