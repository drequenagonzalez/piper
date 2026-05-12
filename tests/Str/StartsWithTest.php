<?php

use function Spatie\Piper\Str\startsWith;

it('checks whether a string starts with a needle', function () {
    expect('Laravel' |> startsWith('Lar'))->toBeTrue();
    expect('Laravel' |> startsWith(['Symfony', 'Lar']))->toBeTrue();
    expect('Laravel' |> startsWith('Symfony'))->toBeFalse();
});
