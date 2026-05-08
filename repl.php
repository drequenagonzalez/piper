#!/usr/bin/env php
<?php

declare(strict_types=1);

use Psy\Shell;

require __DIR__.'/vendor/autoload.php';

$shell = new Shell();
$shell->addInput('namespace Spatie\\Piper;', true);

exit($shell->run());
