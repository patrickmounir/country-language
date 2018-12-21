<?php

namespace App;

class CountryService
{

    /**
     * @var
     */
    private $curl;

    /**
     * @var string
     */
    private $baseURI;

    /**
     * CountryService constructor.
     *
     * @param null $baseURI
     */
    public function __construct($baseURI = null)
    {
        if (!$baseURI) {
            $baseURI = "https://restcountries.eu/rest/v2";
        }

        $this->baseURI = $baseURI;
    }

    /**
     * Returns the country language code in ISO 639 1.
     *
     * @param string $country
     *
     * @return string|null
     */
    public function getCountryLanguage(string $country)
    {
        $requestURI = "/name/{$country}?fullText=true";

        $this->prepareCurl($requestURI);

        $response = $this->execute();

        return $response? $response[0]['languages'][0]['iso639_1'] : $response;
    }

    /**
     * Returns an array of countries that have the language.
     *
     * @param string $languageCode
     *
     * @return array|null
     */
    public function getCountriesWithLanguage(string $languageCode)
    {
        $requestURI = "/lang/{$languageCode}?fields=name";

        $this->prepareCurl($requestURI);

        $response = $this->execute();

        return $response? collect($response)->pluck('name')->toArray() : $response;
    }

    /**
     * Checks if Country Exists.
     *
     * @param $country
     *
     * @return bool
     */
    public function countryExists($country)
    {
        $requestURI = "/name/{$country}?fullText=true&fields=name";

        $this->prepareCurl($requestURI);

        $response = $this->execute();

        return !is_null($response);
    }

    /**
     * Prepares Curl request.
     *
     * @param $requestURI
     */
    private function prepareCurl($requestURI)
    {
        $this->curl = curl_init($this->baseURI.$requestURI);

        $options = [
            CURLOPT_RETURNTRANSFER => true
        ];

        curl_setopt_array($this->curl, $options);
    }

    /**
     * Execute and decodes the response of the curl request.
     *
     * @return array|null
     */
    private function execute()
    {
        /** @var array $response */
        $response = json_decode(curl_exec($this->curl), true);

        curl_close($this->curl);

        if (array_has($response, ['status']) && $response['status'] == 404) {
            return null;
        }

        return $response;
    }
}