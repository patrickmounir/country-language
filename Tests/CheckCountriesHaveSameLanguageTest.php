<?php

namespace Tests;

use App\CountryCheck;
use PHPUnit\Framework\TestCase;

class CheckCountriesHaveSameLanguageTest extends TestCase
{
    /** @test */
    function it_has_method_checkHaveSameLanguage()
    {
        $countryCheck = new CountryCheck();

        $this->assertTrue(
            method_exists($countryCheck, 'checkHaveSameLanguage'),
            'Class does not have method checkHaveSameLanguage'
        );
    }

    /** @test */
    function it_returns_true_when_passing_spain_and_argentina()
    {
        $countryCheck = new CountryCheck();

        $this->assertTrue($countryCheck->checkHaveSameLanguage('Spain', 'Argentina'));
    }

    /** @test */
    function it_returns_false_when_passing_spain_and_uk()
    {
        $countryCheck = new CountryCheck();

        $this->assertFalse($countryCheck->checkHaveSameLanguage('Spain', 'UK'));
    }
}
