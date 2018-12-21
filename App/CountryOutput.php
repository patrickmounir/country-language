<?php

namespace App;

class CountryOutput
{

    /**
     * @var CountryService
     */
    private $countryService;

    /**
     * CountryOutput constructor.
     */
    public function __construct()
    {
        $this->countryService = new CountryService();
    }

    /**
     * @return CountryService
     */
    public function getCountryService()
    {
        return $this->countryService;
    }
}