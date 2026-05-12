<?php

use function Spatie\Piper\Str\words;

it('limits a string by words', function () {
    expect('Taylor Otwell' |> words(1))->toBe('Taylor...');
    expect('Taylor Otwell' |> words(1, '___'))->toBe('Taylor___');
    expect('Taylor Otwell' |> words(3))->toBe('Taylor Otwell');
});
