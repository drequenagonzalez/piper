<?php

use function Spatie\Piper\Str\isMatch;

it('checks whether a string matches a regex pattern', function () {
    expect('Laravel' |> isMatch('/Lara/'))->toBeTrue();
    expect('Laravel' |> isMatch('/Symfony/'))->toBeFalse();
});
