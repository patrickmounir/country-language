<?php

namespace App;

class CountryCheck
{
    public function checkHaveSameLanguage($firstCountry, $secondCountry)
    {
        $countryService = new CountryService();

        $firstLanguage = $countryService->getCountryLanguage($firstCountry);

        $secondLanguage = $countryService->getCountryLanguage($secondCountry);

        return $firstLanguage === $secondLanguage;
    }
}
