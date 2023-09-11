<?php

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use InvalidArgumentException;

class LengthMaxRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (empty($params[0])) {
            throw new InvalidArgumentException('Maximum length not specified');
        }
    }

    public function getMessage(array $data, string $field, array $params): string
    {
    }
}
