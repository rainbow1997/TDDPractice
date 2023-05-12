<?php

namespace Smost\Jargon;

class Subscription
{
    public function __construct(protected Gateway $gateway)
    {

    }
    public function create(User $user)
    {
        //create a subscription through Stripe
        $this->gateway->create();
        //update the local user
        $user->markAsSubscribed();
        //send a welcome email or dispatch event.
    }

}