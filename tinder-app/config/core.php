<?php

use App\Modules\SmartAssSelector\Rules\BioRule;
use App\Modules\SmartAssSelector\Rules\NameRule;

return [
    'endpoints' => [
        'list' => [
            'method' => 'GET',
            'url' => 'https://api.gotinder.com/v2/recs/core?locale=ru'
        ],
        'like' => [
            'method' => 'POST',
            'url' => 'https://api.gotinder.com/like/'
        ],
        'pass' => [
            'method' => 'POST',
            'url' => 'https://api.gotinder.com/pass/'
        ]
    ],
    'required_headers' => [
        'accept' => 'application/json',
        'accept-encoding' => 'gzip, deflate, br',
        'accept-language' => 'ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
        'app-session-id' => '1ff5e7fa-36ba-4940-be3a-a4b227b697f1',
        'app-session-time-elapsed' => '282469',
        'app-version' => '1027400',
        'origin' => 'https://tinder.com',
        'persistent-device-id' => 'b4324f5d-fb49-4eeb-8073-044aa74266f2',
        'platform' => 'web',
        'referer' => 'https://tinder.com/',
        'sec-ch-ua' => '"Chromium";v="88", "Google Chrome";v="88", ";Not A Brand";v="99"',
        'sec-ch-ua-mobile' => '?0',
        'sec-fetch-dest' => 'empty',
        'sec-fetch-mode' => 'cors',
        'sec-fetch-site' => 'cross-site',
        'tinder-version' => '2.74.0',
        'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36',
        'user-session-id' => '514d83fa-de34-48e6-bbf4-3e091a7cd055',
        'user-session-time-elapsed' => '11760',
        'x-auth-token' => 'b11fb88c-f93d-4f88-b17a-61b267f30f09',
        'x-supported-image-formats' => 'jpeg',
    ],
    'analyser_rules' => [
        BioRule::class,
        NameRule::class
    ],
    'instagram_url' => 'https://www.instagram.com/'
];
