<?php

namespace App\Validators;

class CustomFormValidation extends FormValidation
{

    public function isAnswerNotEmpty($data): ?string
    {
        if ($data == null || trim($data) == '') {
            return 'Ответ на вопрос не должен быть пустым';
        }    
        return null;
    }

    public function isAnswerMinLength($data, $minLength): ?string
    {
        if (strlen(trim($data)) < $minLength) {
            return "Длина ответа должна быть не менее $minLength символов";
        }
        return null;
    }

    public function isAnswerMaxLength($data, $maxLength): ?string
    {
        if (strlen(trim($data)) > $maxLength) {
            return "Длина ответа не должна превышать $maxLength символов";
        }
        return null;
    }

    public function isStudentName($data): ?string
    {
        if (empty($data)) {
            return 'Введите ваше ФИО';
        }
        $words = preg_split('/\s+/', trim($data));
        if (count($words) < 3) {
            return 'ФИО должно состоять минимум из 3 слов (Фамилия Имя Отчество)';
        }
        if (!preg_match('/^[A-Za-zА-Яа-яЁё\s\-]+$/u', $data)) {
            return 'ФИО должно содержать только буквы кириллицы';
        }

        return null;
    }

    public function isGroupSelected($data): ?string
    {
        if ($data == null || empty(trim($data))) {
            return 'Выберите вашу группу';
        }
        return null;
    }

    public function isAnswerSelected($data): ?string
    {
        if (empty($data) || $data == null) {
            return 'Выберите вариант ответа';
        }
        return null;
    }

    public function Validate(array $postData): bool
    {
        $this->Errors = [];

        foreach ($this->Rules as $rule) {
            $fieldName = $rule['field'];
            $validatorName = $rule['validator'];
            $ruleValue = $rule['value'];
            $data = $postData[$fieldName] ?? null;
            $error = null;
            switch ($validatorName) {
                case 'isNotEmpty':
                    $error = $this->isNotEmpty($data);
                    break;
                case 'isEmail':
                    $error = $this->isEmail($data);
                    break;
                case 'isInteger':
                    $error = $this->isInteger($data);
                    break;
                case 'isAnswerNotEmpty':
                    $error = $this->isAnswerNotEmpty($data);
                    break;
                case 'isAnswerMinLength':
                    $error = $this->isAnswerMinLength($data, $ruleValue);
                    break;
                case 'isAnswerMaxLength':
                    $error = $this->isAnswerMaxLength($data, $ruleValue);
                    break;
                case 'isStudentName':
                    $error = $this->isStudentName($data);
                    break;
                case 'isGroupSelected':
                    $error = $this->isGroupSelected($data);
                    break;
                case 'isAnswerSelected':
                    $error = $this->isAnswerSelected($data);
                    break;
            }
            if ($error !== null) {
                $this->Errors[$fieldName][] = $error;
            }
        }
        return empty($this->Errors);
    }
}
