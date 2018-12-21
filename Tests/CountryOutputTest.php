<?php

namespace Tests;

use App\CountryCheck;
use App\CountryOutput;
use App\CountryService;
use PHPUnit\Framework\TestCase;

class CountryOutputTest extends TestCase
{
    /** @test */
    function it_has_attribute_country_service()
    {
        $countryOutput = new CountryOutput();

        $this->assertObjectHasAttribute('countryService', $countryOutput);

        $this->assertTrue(
            method_exists($countryOutput, 'getCountryService'),
            'Class should have method getCountryService'
        );

        $this->assertInstanceOf(CountryService::class, $countryOutput->getCountryService());
    }

    /** @test */
    function it_has_attribute_country_checker()
    {
        $countryOutput = new CountryOutput();

        $this->assertObjectHasAttribute('countryChecker', $countryOutput);

        $this->assertTrue(
            method_exists($countryOutput, 'getCountryChecker'),
            'Class should have method getCountryChecker'
        );

        $this->assertInstanceOf(CountryCheck::class, $countryOutput->getCountryChecker());
    }

    /** @test */
    function it_has_method_handle()
    {
        $countryOutput = new CountryOutput();

        $this->assertTrue(
            method_exists($countryOutput, 'handle'),
            'Class should have method handle'
        );
    }

    /** @test */
    function it_when_handle_is_called_with_array_of_country_its_language_and_other_countries_return_in_string()
    {
        $countryOutput = new CountryOutput();

        $output = $countryOutput->handle(['Spain']);

        $this->assertContains(
            "Country language code: es",
            $output
        );

        $this->assertContains(
            "Spain speaks same language with these countries: ",
            $output
        );
    }

    /** @test */
    function it_when_handle_is_called_with_array_of_two_return_a_string_if_they_do_not_speak_the_same_language()
    {
        $countryOutput = new CountryOutput();

        $output = $countryOutput->handle(['Spain', 'UK']);

        $this->assertEquals(
            "Spain and UK do not speak the same language\n",
            $output
        );
    }

    /** @test */
    function it_when_handle_is_called_with_array_of_two_return_a_string_if_they_speak_the_same_language()
    {
        $countryOutput = new CountryOutput();

        $output = $countryOutput->handle(['Spain', 'Uruguay']);

        $this->assertEquals(
            "Spain and Uruguay speak the same language\n",
            $output
        );
    }
}