<?php

namespace Smost\Jargon;

class User
{
    protected bool $subscribed = false;
    public function __construct(public string $name)
    {

    }
    public function isSubscribed(): bool
    {
        return $this->subscribed;
    }
    public function markAsSubscribed()
    {
        $this->subscribed = true;
    }
}