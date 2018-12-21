<?php

require __DIR__.'/vendor/autoload.php';

try {
    $countryOutput = new \App\CountryOutput();

    echo $countryOutput->handle(array_slice($argv, 1));
} catch (\App\Exceptions\ValidationException $exception) {
    echo 'Validation Exception: '.$exception->getMessage()."\n";
}
