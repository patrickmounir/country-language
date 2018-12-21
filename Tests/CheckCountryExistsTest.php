<?php

namespace Tests;

use App\CountryService;
use PHPUnit\Framework\TestCase;

class CheckCountryExistsTest extends TestCase
{
    /** @test */
    function it_has_method_CountryExists()
    {
        $countryService = new CountryService();

        $this->assertTrue(
            method_exists($countryService, 'countryExists'),
            'Class does not have method countryExists'
        );
    }

    /** @test */
    function it_returns_true_if_country_exists()
    {
        $countryService = new CountryService();

        $this->assertTrue(
            $countryService->countryExists('Spain')
        );
    }

    /** @test */
    function it_returns_false_if_country_does_not_exist()
    {
        $countryService = new CountryService();

        $this->assertFalse(
            $countryService->countryExists('England')
        );
    }
}