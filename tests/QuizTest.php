<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Smost\Jargon\Quiz;
use Smost\Jargon\Question;

class QuizTest extends TestCase
{
    /**
     * @test
     */
    public function ItConsistsOfQuestions()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(
            new Question('What is 2+2 ?', 4)
        );
        $this->assertCount(1, $quiz->getQuestions());
    }

    /**
     * @test
     */
    public function itCanBeGraded()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(new QUestion('What is 2+2?', 4));
        $question = $quiz->getNextQuestion();
        $question->answer(4);
        $this->assertEquals(100, $quiz->grade());
    }

    public function itGradesAFailedQuiz()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(new Question('What is 2+2?', 4));
        $question = $quiz->getNextQuestion();
        $question->answer(4);
        $this->assertEquals(0, $quiz->grade());
    }
}