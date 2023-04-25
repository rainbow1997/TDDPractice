<?php

namespace Smost\Jargon;

class Quiz
{
    protected array $questions;
    public int $questionCount = 0;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function getNextQuestion()
    {
        if(!isset($this->questions[$this->questionCount]))
            return false;

        return $this->questions[$this->questionCount++];
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function grade()
    {
        if(!$this->isCompleted())
            return throw new \Exception("This quiz has not been completed yet.");
        $correct = count($this->correctlyAnsweredQuestions());
        $total = count($this->questions);

        return ($correct / $total) * 100;
    }
    public function isCompleted()
    {
        //todo clean in another time
        $answeredQuestionsCount = count(array_filter($this->questions, fn($question) => $question->isAnswered()));
        $totalQuestionsCount = count($this->questions);
        return $answeredQuestionsCount === $totalQuestionsCount; //True if they are equal
    }
    public function correctlyAnsweredQuestions()
    {
        return array_filter($this->questions, fn($question) => $question->solved());
    }

}