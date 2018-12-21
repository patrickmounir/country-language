<?php

namespace App;

use App\Exceptions\ValidationException;
use App\RequestHandlers\SingleCountryHandler;
use App\RequestHandlers\TwoCountriesHandler;

class CountryOutput
{
    /**
     * @var array
     */
    private $strategies;

    /**
     * @var Validator
     */
    private $validator;

    /**
     * CountryOutput constructor.
     */
    public function __construct()
    {
        $this->strategies[1] = new SingleCountryHandler();

        $this->strategies[2] = new TwoCountriesHandler();

        $this->validator = new Validator();
    }

    /**
     * Handles request from index file.
     *
     * @param array $countries
     *
     * @return string
     *
     * @throws ValidationException
     */
    public function handle(array $countries)
    {
        $this->validator->validate($countries);

        return $this->strategies[count($countries)]->handle($countries);
    }
}