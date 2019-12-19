<?php

namespace App;

class Twitter

{
    private $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }
}