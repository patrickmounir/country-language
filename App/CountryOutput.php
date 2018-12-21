<?php

namespace App;

use App\RequestHandlers\SingleCountryHandler;
use App\RequestHandlers\TwoCountriesHandler;

class CountryOutput
{
    /**
     * @var array
     */
    private $strategies;

    /**
     * CountryOutput constructor.
     */
    public function __construct()
    {
        $this->strategies[1] = new SingleCountryHandler();
        $this->strategies[2] = new TwoCountriesHandler();
    }

    /**
     * @param array $countries
     *
     * @return string
     */
    public function handle(array $countries)
    {
        return $this->strategies[count($countries)]->handle($countries);
    }
}