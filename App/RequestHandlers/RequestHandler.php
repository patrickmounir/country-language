<?php

namespace App\RequestHandlers;

interface RequestHandler
{
    /**
     * @param $countries
     *
     * @return string
     */
    public function handle($countries);
}
