<?php

namespace Tests;

use App\CountryCheck;
use PHPUnit\Framework\TestCase;

class GetCountryLanguageTest extends TestCase
{
    /** @test */
    function it_has_method_getCountryLanguage()
    {
        $countryCheck = new CountryCheck();

        $this->assertTrue(
            method_exists($countryCheck, 'checkHaveSameLanguage'),
            'Class does not have method checkHaveSameLanguage'
        );
    }
}
