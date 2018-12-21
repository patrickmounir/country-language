<?php

namespace App;

class CountryCheck
{
    /**
     * Checks if two countries have the same language.
     *
     * @param $firstCountry
     * @param $secondCountry
     *
     * @return bool
     */
    public function checkHaveSameLanguage($firstCountry, $secondCountry)
    {
        $countryService = new CountryService();

        $firstLanguage = $countryService->getCountryLanguage($firstCountry);

        $secondLanguage = $countryService->getCountryLanguage($secondCountry);

        return $firstLanguage === $secondLanguage;
    }
}
