<?php

namespace Smost\Jargon;

class Subscription
{
    public function __construct(protected Gateway $gateway, protected Mailer $mailer)
    {

    }
    public function create(User $user)
    {
        //create a subscription through Stripe
        $receipt = $this->gateway->create();
//        die(var_dump($receipt));

        //update the local user
        $user->markAsSubscribed();
        var_dump('dispatch an event to handle the mail');
        //send a welcome email or dispatch event.
        $this->mailer->deliver('Your receipt number is: '. $receipt);
    }

}