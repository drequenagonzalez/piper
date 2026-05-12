<?php

use function Spatie\Piper\Arr\hasAny;

it('checks whether any key exists', function () {
    expect(['name' => 'Taylor', 'age' => 40] |> hasAny('missing', 'age'))->toBeTrue();
    expect(['name' => 'Taylor', 'age' => 40] |> hasAny('missing'))->toBeFalse();
});
