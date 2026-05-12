<?php

use function Spatie\Piper\Str\stripTags;

it('strips html tags from a string', function () {
    expect('<p>Laravel</p>' |> stripTags())->toBe('Laravel');
});
