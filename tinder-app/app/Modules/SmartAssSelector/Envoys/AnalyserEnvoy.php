<?php

namespace App\Modules\SmartAssSelector\Envoys;


use App\Modules\DataModels\TinderApi\TinderUser;
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
     * @param TinderUser[] $users
     *
     * @return TinderUser[]
     */
    public function getFittingUsers(array $users): array
    {
        return array_values(
            array_filter(
                $users,
                function (TinderUser $user) {
                    return $this->analyser->analyse($user);
                }
            )
        );
    }
}
