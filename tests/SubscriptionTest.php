<?php

namespace Tests;
use Smost\Jargon\Gateway;
use Smost\Jargon\StripeGateway;
use Smost\Jargon\Subscription;
use PHPUnit\Framework\TestCase;
use Smost\Jargon\User;
use Smost\Jargon\Mailer;
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
//        $gateway = new StripeGateway();
//        $subscription = new Subscription($gateway);
//        $gateway = $this->createMock(Gateway::class);
//        $gateway->method('create')->willReturn('receipt-stub');
        //actually, when we ues stub in testing, we control the input and output of the behavior
        $subscription = new Subscription(new GatewayStub(), $this->createMock(Mailer::class));//we don't need a special behavior to use fake classes
        $user = new User("Mostafa Jamali");
        $this->assertFalse($user->isSubscribed());
        $subscription->create($user);
        $this->assertTrue($user->isSubscribed());
    }
    /**
     * @test
     */
    public function itDeliversAReceipt()
    {
        //stub : we don't need expectations?
        $gateway = $this->createMock(Gateway::class);
        //it just returns a value not expecting!
        $gateway->method('create')->willReturn('receipt-stub');//we use inline stubbing to create a output for a method create
        //</stub>
        //<Mock> we expect an expectation
        $mailer = $this->createMock(Mailer::class);
        $subscription = new Subscription($gateway, $mailer);
        $mailer->expects($this->once())
            ->method('deliver')
            ->with('Your receipt number is: ' . 'receipt-stub');
        //</MOCK>
        // we expect in our test (in subscription class) the method deliver exactly run one time and get us output Your receipt number ...
        $user = new User("Mostafa Jamali");
        $subscription->create($user);
    }
}