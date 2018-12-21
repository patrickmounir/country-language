<?php

namespace App;

use App\RequestHandlers\SingleCountryHandler;
use App\RequestHandlers\TwoCountriesHandler;

class CountryOutput
{
    private $strategies;

    public function __construct()
    {
        $this->strategies[1] = new SingleCountryHandler();
        $this->strategies[2] = new TwoCountriesHandler();
    }

    public function handle(array $countries)
    {
        return $this->strategies[count($countries)]->handle($countries);
    }
}