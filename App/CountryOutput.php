<?php

namespace App;

class CountryOutput
{

    /**
     * @var CountryService
     */
    private $countryService;

    private $countryChecker;

    /**
     * CountryOutput constructor.
     */
    public function __construct()
    {
        $this->countryService = new CountryService();

        $this->countryChecker = new CountryCheck();
    }

    /**
     * @return CountryService
     */
    public function getCountryService()
    {
        return $this->countryService;
    }

    /**
     * @return CountryCheck
     */
    public function getCountryChecker()
    {
        return $this->countryChecker;
    }
    
    public function handle(array $countries)
    {

    }
}