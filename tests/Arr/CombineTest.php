<?php

use function Spatie\Piper\Arr\combine;

it('combines values as keys with another list as values', function () {
    expect(['name', 'age'] |> combine(['Taylor', 40]))->toBe(['name' => 'Taylor', 'age' => 40]);
});
