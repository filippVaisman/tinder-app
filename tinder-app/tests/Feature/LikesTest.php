<?php


use App\Modules\DataModels\TinderApi\TinderUser;
use App\Modules\Likes\Repositories\EloquentLikesRepository;
use Tests\TestCase;

class LikesTest extends TestCase
{
    public function testCreate()
    {
        $e = new EloquentLikesRepository();
        $u = TinderUser::fromArray(
            [
                "badges" => [],
                "bio" => "Ig. namro__",
                "birth_date" => "1999-02-23T10:31:00.339Z",
                "name" => "Sasha",
                "recently_active" => true,
                "_id" => '1',
                'photos' => [['id' => '123123123', 'url' => 'http:123'] , ['id' => '213123']]
            ]
        );

        $e->create($u->toArray());
    }
}
