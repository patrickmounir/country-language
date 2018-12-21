<?php

require __DIR__.'/vendor/autoload.php';

$countryOutput = new \App\CountryOutput();

echo $countryOutput->handle(array_slice($argv, 1));
