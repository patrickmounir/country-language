<?php

namespace Tests;

use App\CountryService;
use PHPUnit\Framework\TestCase;

class GetCountriesWithSameLanguageTest extends TestCase
{
    private function countriesThatSpeakSpanish()
    {
       $countries = json_decode('[{"name":"Argentina"},{"name":"Belize"},{"name":"Bolivia (Plurinational State of)"},{"name":"Chile"},{"name":"Colombia"},{"name":"Costa Rica"},{"name":"Cuba"},{"name":"Dominican Republic"},{"name":"Ecuador"},{"name":"El Salvador"},{"name":"Equatorial Guinea"},{"name":"Guam"},{"name":"Guatemala"},{"name":"Honduras"},{"name":"Mexico"},{"name":"Nicaragua"},{"name":"Panama"},{"name":"Paraguay"},{"name":"Peru"},{"name":"Puerto Rico"},{"name":"Spain"},{"name":"Uruguay"},{"name":"Venezuela (Bolivarian Republic of)"},{"name":"Western Sahara"}]', true);

        return collect($countries)->pluck('name')->toArray();
    }

    private function countriesThatSpeakEnglish()
    {
        $countries = json_decode('[{"name":"China"},{"name":"Hong Kong"},{"name":"Macao"},{"name":"Singapore"},{"name":"Taiwan"}]', true);

        return collect($countries)->pluck('name')->toArray();
    }

    /** @test */
    function it_has_method_getCountriesWithLanguage()
    {
        $countryService = new CountryService();

        $this->assertTrue(
            method_exists($countryService, 'getCountriesWithLanguage'),
            'Class does not have method getCountriesWithLanguage'
        );
    }

    /** @test */
    function it_returns_the_countries_that_speak_spanish()
    {
        $countryService = new CountryService();

        $this->assertEquals(
            $this->countriesThatSpeakSpanish(),
            $countryService->getCountriesWithLanguage('es')
        );
    }

    /** @test */
    function it_returns_the_countries_that_speak_chinese()
    {
        $countryService = new CountryService();

        $this->assertEquals(
            $this->countriesThatSpeakEnglish(),
            $countryService->getCountriesWithLanguage('zh')
        );
    }
}