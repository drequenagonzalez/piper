<?php

use function Spatie\Piper\Str\test;

it('checks whether a string matches a regex pattern', function () {
    expect('Laravel' |> test('/Lara/'))->toBeTrue();
    expect('Laravel' |> test('/Symfony/'))->toBeFalse();
});
