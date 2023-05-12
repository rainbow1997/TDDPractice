<?php

namespace Tests;
use Smost\Jargon\Gateway;
use Smost\Jargon\StripeGateway;
use Smost\Jargon\Subscription;
use PHPUnit\Framework\TestCase;
use Smost\Jargon\User;
class SubscriptionTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesAStripeSubscription()
    {
        $this->markTestSkipped();
    }
    /**
     * @test
     */
    public function creatingASubscriptionMarksTheUserAsSubscribed()
    {
        $gateway = new StripeGateway();
//        $subscription = new Subscription($gateway);
        $subscription = new Subscription($this->createMock(Gateway::class));//we don't need a special behavior to use fake classes
        $user = new User("Mostafa Jamali");
        $this->assertFalse($user->isSubscribed());
        $subscription->create($user);
        $this->assertTrue($user->isSubscribed());
    }
}