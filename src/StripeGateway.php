<?php

namespace Smost\Jargon;

class StripeGateway implements Gateway
{

    public function create()
    {
        echo 'hhhh';
        echo var_dump("Slow Http Request.");
    }
}