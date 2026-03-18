<?php

namespace App\Validators;

class FormValidation
{
    protected array $Rules = [];
    protected array $Errors = [];

    public function isNotEmpty($data): ?string
    {
        if (empty($data) && $data !== '0') {
            return 'Поле не должно быть пустым';
        }
        return null;
    }

    public function isInteger($data): ?string
    {
        if (!is_numeric($data) || intval($data) != $data) {
            return 'Значение должно быть целым числом';
        }
        return null;
    }

    public function isLess($data, $value): ?string
    {
        if (!is_numeric($data) || intval($data) < intval($value)) {
            return "Значение должно быть не меньше $value";
        }
        return null;
    }

    public function isGreater($data, $value): ?string
    {
        if (!is_numeric($data) || intval($data) > intval($value)) {
            return "Значение должно быть не больше $value";
        }
        return null;
    }

    public function isEmail($data): ?string
    {
        if (empty($data) && $data !== '0') {
            return null;
        }

        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return 'Некорректный email адрес';
        }
        return null;
    }

    public function SetRule(string $fieldName, string $validatorName, $value = null): void
    {
        $this->Rules[] = [
            'field' => $fieldName,
            'validator' => $validatorName,
            'value' => $value,
        ];
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
                case 'isInteger':
                    $error = $this->isInteger($data);
                    break;
                case 'isLess':
                    $error = $this->isLess($data, $ruleValue);
                    break;
                case 'isGreater':
                    $error = $this->isGreater($data, $ruleValue);
                    break;
                case 'isEmail':
                    $error = $this->isEmail($data);
                    break;
            }
            if ($error !== null) {
                $this->Errors[$fieldName][] = $error;
            }
        }
        return empty($this->Errors);
    }

    public function getFieldError(string $fieldName): string
    {
        if (isset($this->Errors[$fieldName]) && !empty($this->Errors[$fieldName])) {
            return $this->Errors[$fieldName][0];
        }
        return '';
    }

    public function getErrors(): array
    {
        return $this->Errors;
    }

    public function reset(): void
    {
        $this->Rules = [];
        $this->Errors = [];
    }
}