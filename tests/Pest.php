<?php

expect()->extend('toBeArrayWithKeys', function (array $expected) {
    return $this->toBe($expected);
});
