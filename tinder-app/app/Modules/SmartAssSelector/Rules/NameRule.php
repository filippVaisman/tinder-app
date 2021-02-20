<?php


namespace App\Modules\SmartAssSelector\Rules;


use App\Modules\DataModels\TinderApi\TinderUser;

class NameRule extends Rule
{

    protected array $acceptedNameCombinations = [
        'sh',
        'v',
        'x',
        'yo',
        'iy',
        'ya'
    ];

    /**
     * @param TinderUser $tinderUser
     * @return Rule
     */
    public function filter(TinderUser $tinderUser): Rule
    {
        if ($this->containsAny($tinderUser->getName(), $this->acceptedNameCombinations)) {
            $this->passed = true;
        }

        if ((bool)preg_match('/[\p{Cyrillic}]/u', $tinderUser->getName())) {
            $this->passed = true;
        }

        return $this;
    }
}
