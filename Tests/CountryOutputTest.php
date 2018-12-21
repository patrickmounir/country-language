<?php

namespace Tests;

use App\CountryOutput;
use App\CountryService;
use PHPUnit\Framework\TestCase;

class CountryOutputTest extends TestCase
{
    /** @test */
    function it_has_attribute_country_checker()
    {
        $countryOutput = new CountryOutput();

        $this->assertObjectHasAttribute('countryService', $countryOutput);

        $this->assertTrue(method_exists($countryOutput, 'getCountryService'), 'Class should have method getCountryService');

        $this->assertInstanceOf(CountryService::class, $countryOutput->getCountryService());
    }
}