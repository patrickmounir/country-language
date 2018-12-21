<?php

namespace App;

class CountryService
{

    public function getCountryLanguage(string $country)
    {
        $curl = curl_init("https://restcountries.eu/rest/v2/name/{$country}?fullText=true");

        $options = [
            CURLOPT_RETURNTRANSFER => true
        ];
        
        curl_setopt_array($curl, $options);

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $response[0]['languages'][0]['iso639_1'];
    }
}