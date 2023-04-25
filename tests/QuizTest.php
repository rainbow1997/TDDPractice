<?php

namespace Tests;

use http\Exception;
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
        $quiz->addQuestion(new Question('What is 2+2?', 4));
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
    /**
     * @test
     */
    public function itCorrectlyTracksTheNextQuestionInTheQueue()
    {
        $quiz = new Quiz();
        $quiz->addQuestion($question1 = new Question('What is 2+2?', 4));
        $quiz->addQuestion($question2 = new Question('What is 3+3?',6));
        $this->assertEquals($question1, $quiz->getNextQuestion());
        $this->assertEquals($question2, $quiz->getNextQuestion());
    }
    /**
     * @test
     */
    public function itReturnsFalseIfThereAreNoRemainingNextQuestions()
    {
        $quiz = new Quiz();
        $quiz->addQuestion($question1 = new Question('What is 2+2?', 4));
        $this->assertEquals($question1, $quiz->getNextQuestion());
        $this->assertFalse($quiz->getNextQuestion());
    }
    /**
     * @test
     */
    public function itKnowsIfItIsCompleted()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(new Question('What is 2+2?', 4));
        $this->assertFalse($quiz->isCompleted());
        $quiz->getNextQuestion()->answer(4);
        $this->assertTrue($quiz->isCompleted());

    }

    /**
     * @test
     */
    public function itCannotBeGradedUntilAllQuestionsHaveBeenAnswered()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(new Question('What is 2+2?', 4));
        $this->expectException(\Exception::class);
        //When
        $quiz->grade();
    }


}