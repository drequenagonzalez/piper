<?php

use function Spatie\Piper\Str\wordWrap;

it('wraps strings at a given width', function () {
    expect('The quick brown fox' |> wordWrap(10))->toBe("The quick\nbrown fox");
});
