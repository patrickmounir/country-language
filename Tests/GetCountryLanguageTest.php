<?php

namespace Tests;

use App\CountryService;
use PHPUnit\Framework\TestCase;

class GetCountryLanguageTest extends TestCase
{
    /** @test */
    function it_has_method_getCountryLanguage()
    {
        $countryService = new CountryService();

        $this->assertTrue(
            method_exists($countryService, 'getCountryLanguage'),
            'Class does not have method getCountryLanguage'
        );
    }

    /** @test */
    function it_returns_es_for_Spain()
    {
        $countryService = new CountryService();

        $this->assertEquals(
            'es',
            $countryService->getCountryLanguage('Spain'),
            'Returned the wrong output for the Country Spain'
        );
    }
}
