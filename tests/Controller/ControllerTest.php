<?php

namespace App\Tests\Controller;

use App\Entity\User;

class ControllerTest
{
    public function createAuthenticateClient(User $user)
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/login_check',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'username' => $user->getEmail(),
                'password' => $user->getPassword(),
            ])
        );

        $data = json_decode($client->getResponse()->getContent(), true);
        dump($data);

        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));

        return $client;
    }


}