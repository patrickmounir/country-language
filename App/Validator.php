<?php

namespace App;

use App\Exceptions\ValidationException;

class Validator
{
    /**
    * Validates the input.
    *
    * @param array $countries
    *
    * @throws ValidationException
    */
    public function validate(array $countries)
    {
        $countryService = new CountryService();

        foreach ($countries as $country) {
            if (!$countryService->countryExists($country)) {
                throw new ValidationException("{$country} does not exist in the api countries database");
            }
        }

        if (count($countries) > 2) {
            throw new ValidationException("Can't pass more than two Countries");
        }

        if (count($countries) < 1) {
            throw new ValidationException("Should have at least one country");
        }
    }
}