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
        if (count($countries) == 1) {
            $language = $this->countryService->getCountryLanguage($countries[0]);

            $countriesWithSameLanguage = implode(', ', $this->countryService->getCountriesWithLanguage($language));

            return "Country language code: {$language}\n{$countries[0]} speaks same language with these countries: {$countriesWithSameLanguage}\n";
        }

        if (count($countries) == 2) {
            $haveSameLanguage = $this->countryChecker->checkHaveSameLanguage($countries[0], $countries[1]);

            $verb = $haveSameLanguage? 'speak' : 'do not speak';

            return "{$countries[0]} and {$countries[1]} {$verb} the same language\n";
        }
    }
}