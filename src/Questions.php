<?php

namespace Smost\Jargon;
use Countable;
class Questions implements Countable
{

    public function __construct(public array $questions = [])
    {

    }
    public function add(Question $question)
    {
        $this->questions[] = $question;
    }
    public function next()
    {
        // $a = [3,5] , current is = 3 and next advances the array pointer
        $currentQuestion = current($this->questions);
        next($this->questions);
        return $currentQuestion;
    }
    public function count()
    {
        return count($this->questions);
    }
    public function answered()
    {
        return array_filter($this->questions, fn($question) => $question->isAnswered());
    }
    public function solved()
    {
        return array_filter($this->questions, fn($question) => $question->isSolved());
    }
}