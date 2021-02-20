<?php

namespace App\Modules\SmartAssSelector\Rules;


use App\Modules\DataModels\TinderApi\TinderUser;

abstract class Rule
{
    protected bool $passed = false;

    /**
     * @param TinderUser $tinderUser
     */
    abstract public function filter(TinderUser $tinderUser): self;

    /**
     * @return bool
     */
    public function passed(): bool
    {
        return $this->passed;
    }

    /**
     * @param string $haystack
     * @param array $needles
     *
     * @return bool
     */
    protected function containsAny(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if( str_contains(strtolower($haystack), strtolower($needle))) {
                return true;
            }
        }

        return false;
    }
}
