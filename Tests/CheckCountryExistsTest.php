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
}