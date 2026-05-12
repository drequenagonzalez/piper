<?php

use function Spatie\Piper\Str\mask;

it('masks part of a string', function () {
    expect('Taylor Otwell' |> mask('*', 3))->toBe('Tay**********');
});
