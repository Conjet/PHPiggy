<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;

class Validator
{
    private array $rules = [];

    public function add(string $alias, RuleInterface $rule)
    {
        $this->rules[$alias] = $rule;
    }

    public function validate(array $formData, array $fields)
    {

        foreach ($fields as $fieldName => $rules) {
            foreach ($rules as $rule) {
                $ruleValidator = $this->rules[$rule];
                echo '<br>' . $fieldName . ': ';
                if ($ruleValidator->validate($formData, $fieldName, [])) {
                    echo 'ok';
                    continue;
                }
                echo "Error";
            }
        }
    }
}
