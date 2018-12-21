<?php

namespace Tests;

use App\CountryService;
use PHPUnit\Framework\TestCase;

class GetCountriesWithSameLanguageTest extends TestCase
{
    /** @test */
    function it_has_method_getCountriesWithLanguage()
    {
        $countryService = new CountryService();

        $this->assertTrue(
            method_exists($countryService, 'getCountriesWithLanguage'),
            'Class does not have method getCountriesWithLanguage'
        );
    }
}