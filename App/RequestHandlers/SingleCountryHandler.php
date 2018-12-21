<?php

namespace App\RequestHandlers;

use App\CountryService;

class SingleCountryHandler implements RequestHandler
{
    public function handle($countries)
    {
        $countryService = new CountryService();

        $language = $countryService->getCountryLanguage($countries[0]);

        $countriesWithSameLanguage = implode(', ', $countryService->getCountriesWithLanguage($language));

        return "Country language code: {$language}\n{$countries[0]} speaks same language with these countries: {$countriesWithSameLanguage}\n";
    }
}
