<?php

namespace App\Modules\SmartAssSelector\Services;

use App\Modules\DataModels\SmartAssSelector\AnalysedUser;
use App\Modules\DataModels\TinderApi\TinderUser;
use App\Modules\SmartAssSelector\Rules\Rule;
use Illuminate\Support\Facades\Log;

class TinderUserAnalyser
{
    /**
     * @param TinderUser $tinderUser
     * @return bool
     */
    public function analyseOne(TinderUser $tinderUser): bool
    {
        // TODO: refactor shitty app()->make
        /** @var Rule $rule */
        foreach (config('core.analyser_rules') as $rule) {
            $rule = app()->make($rule);
            $rule->filter($tinderUser);
            if ($rule->passed()) {
                Log::info('Rule: '. get_class($rule) . " passed. User name: ". $tinderUser->getName());
                return true;
            }
        }

        return false;
    }

    /**
     * @param array $tinderUsers
     *
     * @return AnalysedUser[]
     */
    public function analyse(array $tinderUsers): array
    {
        $analysed = [];
        foreach ($tinderUsers as $tinderUser) {
            $analysed[] = new AnalysedUser(
                $this->analyseOne($tinderUser),
                $tinderUser
            );
        }

        return $analysed;
    }
}
