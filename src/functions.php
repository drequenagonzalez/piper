<?php

foreach (glob(__DIR__.'/Support/*.php') as $functionFile) {
    require_once $functionFile;
}

foreach (glob(__DIR__.'/Arr/*.php') as $functionFile) {
    require_once $functionFile;
}

foreach (glob(__DIR__.'/Str/*.php') as $functionFile) {
    require_once $functionFile;
}
