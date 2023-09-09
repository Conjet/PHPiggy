<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class MinRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
    }

    public function getMessage(array $data, string $field, array $params): string
    {
    }
}
