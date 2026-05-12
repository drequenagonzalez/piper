<?php

use function Spatie\Piper\Str\contains;

it('checks whether the string contains a needle', function () {
    expect('This is my name' |> contains('my'))->toBeTrue();
    expect('This is my name' |> contains(['Taylor', 'my']))->toBeTrue();
});

it('can ignore case', function () {
    expect('This is my name' |> contains('MY'))->toBeFalse();
    expect('This is my name' |> contains('MY', ignoreCase: true))->toBeTrue();
});

it('does not match empty needles', function () {
    expect('This is my name' |> contains(''))->toBeFalse();
});
