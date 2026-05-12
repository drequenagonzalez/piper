<?php

use function Spatie\Piper\Arr\doesntContain;

it('checks whether the array does not contain a value', function () {
    expect(['Taylor', 'Abigail'] |> doesntContain('Jess'))->toBeTrue();
});
