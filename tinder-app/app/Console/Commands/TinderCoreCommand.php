<?php

namespace App\Console\Commands;

use App\Modules\Likes\Envoys\LikesEnvoy;
use App\Modules\SmartAssSelector\Envoys\AnalyserEnvoy;
use App\Modules\TinderApi\Services\RequestService;
use Illuminate\Console\Command;

class TinderCoreCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tinder:core';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs core tinder functionalities';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param RequestService $requestService
     * @param AnalyserEnvoy $analyser
     * @param LikesEnvoy $likesEnvoy
     *
     * @return int
     */
    public function handle(RequestService $requestService, AnalyserEnvoy $analyser, LikesEnvoy $likesEnvoy)
    {
        while (true) {
            $users = $requestService->generateList();

            foreach ($analyser->analyse($users) as $analysedUser) {
                $tinderUser = $analysedUser->getTinderUser();

                if($analysedUser->getFitting()) {
                    $requestService->likeUser($tinderUser);
                    echo "Girl ". $tinderUser->getId(). " ". $tinderUser->getName(). " ". " is fitting you !\n";
                    $likesEnvoy->create($tinderUser);
                } else {
                    $requestService->passUser($tinderUser);
                }
                sleep(rand(1,4));
            }

            sleep(rand(1,2));
        }

        return 0;
    }
}
