<?php

namespace App\Modules\SmartAssSelector\Rules;


use App\Modules\DataModels\TinderApi\TinderUser;

class BioRule extends Rule
{
    protected array $acceptedBioCombinations = [
        '🇺🇦',
        '🇷🇺'
    ];

    protected $singleWords = [
        'ru',
        'ua'
    ];

    public function filter(TinderUser $tinderUser): Rule
    {
        if ($this->containsAny($tinderUser->getBio(), $this->acceptedBioCombinations)) {
            $this->passed = true;
        }

        if ($this->containsSingleWord($tinderUser->getBio())) {
            $this->passed = true;
        }

        if ((bool)preg_match('/[\p{Cyrillic}]/u', $tinderUser->getName())) {
            $this->passed = true;
        }

        return $this;
    }

    /**
     * @param string $haystack
     *
     * @return bool
     */
    protected function containsSingleWord(string $haystack): bool
    {
        $words = explode(' ', $haystack);
        foreach ($words as $word) {
            if(in_array($word,$this->singleWords)) {
                return true;
            }
        }

        return false;
    }
}
