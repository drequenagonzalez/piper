<?php

foreach (glob(__DIR__.'/Functions/*.php') as $functionFile) {
    require_once $functionFile;
}
