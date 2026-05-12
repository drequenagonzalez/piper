<?php

use function Spatie\Piper\Str\exactly;

it('checks whether two strings are exactly equal', function () {
    expect('Laravel' |> exactly('Laravel'))->toBeTrue();
    expect('Laravel' |> exactly('laravel'))->toBeFalse();
});
