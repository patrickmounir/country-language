<?php

namespace App;

class CountryService
{

    /**
     * Returns the country language code in ISO 639 1.
     *
     * @param string $country
     *
     * @return string|null
     */
    public function getCountryLanguage(string $country)
    {
        $curl = curl_init("https://restcountries.eu/rest/v2/name/{$country}?fullText=true");

        $options = [
            CURLOPT_RETURNTRANSFER => true
        ];

        curl_setopt_array($curl, $options);

        $response = json_decode(curl_exec($curl), true);

        if (array_has($response, ['status']) && $response['status'] == 404) {
                return null;
        }

        curl_close($curl);

        return $response[0]['languages'][0]['iso639_1'];
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
        $curl = curl_init("https://restcountries.eu/rest/v2/lang/{$languageCode}?fields=name");

        $options = [
            CURLOPT_RETURNTRANSFER => true
        ];

        curl_setopt_array($curl, $options);

        $response = json_decode(curl_exec($curl), true);

        if (array_has($response, ['status']) && $response['status'] == 404) {
            return null;
        }

        curl_close($curl);

        return collect($response)->pluck('name')->toArray();
    }
}