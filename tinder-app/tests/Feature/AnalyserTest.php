<?php


use App\Modules\DataModels\TinderApi\TinderUser;
use App\Modules\SmartAssSelector\Envoys\AnalyserEnvoy;
use App\Modules\SmartAssSelector\Services\TinderUserAnalyser;
use Tests\TestCase;

class AnalyserTest extends TestCase
{
    public function testAnalyser()
    {
        $analyser = new AnalyserEnvoy(new TinderUserAnalyser());
        $users = [
            TinderUser::fromArray(
                [
                    "badges" => [],
                    "bio" => "Ig. namro__",
                    "birth_date" => "1999-02-23T10:31:00.339Z",
                    "name" => "Sasha",
                    "recently_active" => true,
                    "_id" => '1',
                    'photos' => [['id' => '123123123', 'url' => 'http:123'] , ['id' => '213123']]
                ]
            ),
            TinderUser::fromArray(
                [
                    "badges" => [],
                    "bio" => "ua",
                    "birth_date" => "1999-02-23T10:31:00.339Z",
                    "name" => "Paulina",
                    "recently_active" => true,
                    "_id" => '2'
                ]
            ),
            TinderUser::fromArray(
                [
                    "badges" => [],
                    "bio" => "Ig. namro__",
                    "birth_date" => "1999-02-23T10:31:00.339Z",
                    "name" => "Саша",
                    "recently_active" => true,
                    "_id" => '3'
                ]
            ),
            TinderUser::fromArray(
                [
                    "badges" => [],
                    "bio" => "Ig. namro__",
                    "birth_date" => "1999-02-23T10:31:00.339Z",
                    "name" => "Paulina",
                    "recently_active" => true,
                    "_id" => '4'
                ]
            ),
            TinderUser::fromArray(
                [
                    "badges" => [],
                    "bio" => "Halo Kraków. Szukam jakiegoś otwartego baru/klubu!",
                    "birth_date" => "1999-02-23T10:31:00.339Z",
                    "name" => "Ewa",
                    "recently_active" => true,
                    "_id" => '5'
                ]
            )
        ];


        foreach ($analyser->getFittingUsers($users) as $user ) {
            $this->assertTrue(
                in_array(
                    $user->getId(),
                    [$users[0]->getId(), $users[1]->getId(), $users[2]->getId(), $users[3]]
                )
            );
        }
    }
}
