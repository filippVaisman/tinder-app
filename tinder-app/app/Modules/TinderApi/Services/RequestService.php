<?php

namespace App\Modules\TinderApi\Services;

use App\Modules\DataModels\TinderApi\TinderUser;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class RequestService
{
    /**
     * @return TinderUser[]
     */
    public function generateList(): array
    {
        $client = new Client();
        $r = $client->request(
            config('core.endpoints.list.method'),
            config('core.endpoints.list.url'),
            ['headers' => config('core.required_headers')]
        );

        Log::info('Generate list request result code: '. $r->getStatusCode());

        $rawUsers = collect(
            json_decode(
                $r->getBody()->getContents(),
                true
            )['data']['results']
        );

        $users = collect();
        foreach ($rawUsers as $user) {
            $users->add(
                TinderUser::fromArray($user['user'])
            );
        }

        return $users->toArray();
    }

    /**
     * @param TinderUser $tinderUser
     */
    public function likeUser(TinderUser $tinderUser)
    {
        $client = new Client();
        $url = $this->prepareUrl(config('core.endpoints.like.url'), $tinderUser->getId());

        $r = $client->request(
            config('core.endpoints.like.method'),
            $url,
            ['headers' => config('core.required_headers')]
        );
        Log::info('Like request result code: '. $r->getStatusCode());
    }

    /**
     * @param string $url
     * @param string $uuid
     */
    private function prepareUrl(string $url, string $uuid)
    {
        return $url . $uuid;
    }
}
