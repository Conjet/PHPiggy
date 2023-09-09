<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;

class Validator
{
    private array $rules = [];

    public function add(string $alias, RuleInterface $rule)
    {
    }

    public function validate(array $formData)
    {
        // $formData
    }
}
