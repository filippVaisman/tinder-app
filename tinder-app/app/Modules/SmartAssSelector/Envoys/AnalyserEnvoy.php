<?php

namespace App\Modules\SmartAssSelector\Envoys;


use App\Modules\DataModels\SmartAssSelector\AnalysedUser;
use App\Modules\SmartAssSelector\Services\TinderUserAnalyser;

class AnalyserEnvoy
{
    /**
     * @var TinderUserAnalyser
     */
    private TinderUserAnalyser $analyser;

    /**
     * Analyser constructor.
     * @param TinderUserAnalyser $analyser
     */
    public function __construct(TinderUserAnalyser $analyser)
    {
        $this->analyser = $analyser;
    }

    /**
     * @param array $users
     *
     * @return AnalysedUser[]
     */
    public function analyse(array $users): array
    {
        return $this->analyser->analyse($users);
    }
}
