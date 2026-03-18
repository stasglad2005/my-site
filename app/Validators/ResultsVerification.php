<?php

namespace App\Validators;

class ResultsVerification extends CustomFormValidation
{
    private array $list_answer = [
        'question1' => '0.6',
        'question2' => '8',
        'question3' => 'выборочная совокупность – часть генеральной',
    ];

    private array $results = [];
    private int $correctCount = 0;
    private int $totalQuestions = 0;

    public function checkRadioAnswer($userAnswer, $questionKey): ?string
    {
        if (!isset($this->list_answer[$questionKey])) {
            return null;
        }
        $isCorrect = ($userAnswer === $this->list_answer[$questionKey]);
        $this->results[$questionKey] = [
            'user_answer' => $userAnswer,
            'correct_answer' => $this->list_answer[$questionKey],
            'is_correct' => $isCorrect
        ];
        if ($isCorrect) {
            $this->correctCount++;
        }
        return $isCorrect ? null : 'Неправильный ответ';
    }

    public function checkSelectAnswer($userAnswer, $questionKey): ?string
    {
        if (!isset($this->list_answer[$questionKey])) {
            return null;
        }
        $isCorrect = ($userAnswer === $this->list_answer[$questionKey]);
        $this->results[$questionKey] = [
            'user_answer' => $userAnswer,
            'correct_answer' => $this->list_answer[$questionKey],
            'is_correct' => $isCorrect
        ];
        if ($isCorrect) {
            $this->correctCount++;
        }
        return $isCorrect ? null : 'Неправильный ответ';
    }

    public function checkTextAnswer($userAnswer, $questionKey, $keywords = []): ?string
    {
        if (!isset($this->list_answer[$questionKey])) {
            return null;
        }
        $userAnswer = mb_strtolower(trim($userAnswer));
        if (empty($keywords)) {
            $keywords = [$this->list_answer[$questionKey]];
        }
        $isCorrect = false;
        foreach ($keywords as $keyword) {
            if (mb_strpos($userAnswer, mb_strtolower($keyword)) !== false) {
                $isCorrect = true;
                break;
            }
        }
        $this->results[$questionKey] = [
            'user_answer' => $userAnswer,
            'correct_answer' => $this->list_answer[$questionKey],
            'is_correct' => $isCorrect,
            'keywords' => $keywords
        ];
        if ($isCorrect) {
            $this->correctCount++;
        }
        return $isCorrect ? null : 'Ответ не содержит ключевых слов';
    }

    public function VerifyTestResults(array $postData): ?string
    {
        $this->results = [];
        $this->correctCount = 0;
        $this->totalQuestions = 3;

        $question1Keywords = ['0,6', '0.6', 'шесть десятых'];
        $this->checkTextAnswer(
            $postData['question1'] ?? '',
            'question1',
            $question1Keywords
        );
        $this->checkRadioAnswer(
            $postData['question2'] ?? '',
            'question2'
        );
        $this->checkSelectAnswer(
            $postData['question3'] ?? '',
            'question3'
        );
        switch($this->correctCount)
        {
            case 0:
                return 'Неудовлетворительно (2)';
            case 1:
                return 'Удовлетворительно (3)';
            case 2:
                return 'Хорошо (4)';
            case 3:
                return 'Отлично (5)';   
        }
        return null;
    }
}
