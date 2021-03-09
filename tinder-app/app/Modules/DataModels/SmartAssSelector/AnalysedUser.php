<?php

namespace App\Modules\DataModels\SmartAssSelector;

use App\Modules\DataModels\TinderApi\TinderUser;

class AnalysedUser
{
    /**
     * AnalysedUser constructor.
     *
     * @param bool|null $fitting
     * @param TinderUser|null $tinderUser
     */
    public function __construct(
        protected ?bool $fitting = false,
        protected ?TinderUser $tinderUser = null
    ) {
    }

    /**
     * @return bool|null
     */
    public function getFitting(): ?bool
    {
        return $this->fitting;
    }

    /**
     * @param bool|null $fitting
     * @return AnalysedUser
     */
    public function setFitting(?bool $fitting): AnalysedUser
    {
        $this->fitting = $fitting;
        return $this;
    }

    /**
     * @return TinderUser|null
     */
    public function getTinderUser(): ?TinderUser
    {
        return $this->tinderUser;
    }

    /**
     * @param TinderUser|null $tinderUser
     * @return AnalysedUser
     */
    public function setTinderUser(?TinderUser $tinderUser): AnalysedUser
    {
        $this->tinderUser = $tinderUser;
        return $this;
    }
}
