<?php

namespace Smost\Jargon;

class Quiz
{
    protected array $questions;
    public int $questionCount = 0;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
        $this->questionCount++;
    }

    public function getNextQuestion()
    {
        return $this->questions[$this->questionCount - 1];
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function grade()
    {
        $correct = count($this->correctlyAnsweredQuestions());
        $total = count($this->questions);

        return ($correct / $total) * 100;
    }

    public function correctlyAnsweredQuestions()
    {
        return array_filter($this->questions, fn($question) => $question->solved());
    }

}