<?php

use function Spatie\Piper\Arr\has;

it('checks whether all keys exist', function () {
    expect(['name' => 'Taylor', 'age' => 40] |> has('name', 'age'))->toBeTrue();
    expect(['name' => 'Taylor', 'age' => 40] |> has('name', 'missing'))->toBeFalse();
});
