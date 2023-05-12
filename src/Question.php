<?php

namespace Smost\Jargon;

class Question
{
    protected $body;
    protected $solution;
    protected $answer;
    protected $correct;

    public function __construct($body, $solution)
    {
        $this->body = $body;
        $this->solution = $solution;

    }

    public function answer($answer)
    {
        $this->answer = $answer;
        return $this->isSolved();
    }
    public function isAnswered(): bool
    {
        return isset($this->answer);
    }
    public function isSolved()
    {
        return $this->answer === $this->solution;
    }
}