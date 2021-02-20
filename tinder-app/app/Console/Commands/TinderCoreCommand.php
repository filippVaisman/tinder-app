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

            foreach ($analyser->getFittingUsers($users) as $user) {
                $requestService->likeUser($user);
                $likesEnvoy->create($user);
                echo "Girl ". $user->getId(). " ". $user->getName(). " ". " is fitting you !\n";
                sleep(2);
            }

            sleep(10);
        }

        return 0;
    }
}
