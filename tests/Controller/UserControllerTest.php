<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Routing\RouterInterface;

class UserControllerTest extends ControllerTest
{
    public function testList(): void
    {
        $user = $userRepository->findOneBy([ 'email' => 'admin@admin.com']);
        $client = $this->createAuthenticateClient($user);
        $container = static::getContainer();
        $router = $container->get('router');
        $client->request('GET', $router->generate('api_v1_user_list'));
        $response = $client->getResponse();

        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
    }
}
