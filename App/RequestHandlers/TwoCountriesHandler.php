<?php

namespace App\RequestHandlers;

use App\CountryCheck;

class TwoCountriesHandler implements RequestHandler
{
    /**
     * Handles the request of passing two countries.
     *
     * @param $countries
     *
     * @return string
     */
    public function handle($countries)
    {
        $countryChecker = new CountryCheck();

        $haveSameLanguage = $countryChecker->checkHaveSameLanguage($countries[0], $countries[1]);

        $verb = $haveSameLanguage? 'speak' : 'do not speak';

        return "{$countries[0]} and {$countries[1]} {$verb} the same language\n";
    }
}
