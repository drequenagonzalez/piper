<?php

use function Spatie\Piper\Str\isUuid;

it('checks whether a string is a uuid', function () {
    expect('550e8400-e29b-41d4-a716-446655440000' |> isUuid())->toBeTrue();
    expect('not-a-uuid' |> isUuid())->toBeFalse();
});

it('can check a specific uuid version', function () {
    expect('550e8400-e29b-11d4-a716-446655440000' |> isUuid(1))->toBeTrue();
});
