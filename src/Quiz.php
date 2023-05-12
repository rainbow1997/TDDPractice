<?php

namespace Smost\Jargon;
use Exception;
class Quiz
{
    public int $questionCount = 0;

    public function __construct(public Questions $questions = new Questions())
    {

    }
    public function addQuestion(Question $question)
    {
        $this->questions->add($question);
    }

    public function getNextQuestion()
    {
     return $this->questions->next();
    }

    public function getQuestions(): Questions
    {
        return $this->questions;
    }

    public function grade()
    {
        if(!$this->isCompleted())
            return throw new Exception("This quiz has not been completed yet.");

        $correct = count($this->questions->solved());
        return ($correct / $this->questions->count()) * 100;
    }
    public function begin()
    {
        return $this->getNextQuestion();
    }
    public function isCompleted()
    {
        return count($this->questions->answered()) === $this->questions->count();
    }


}