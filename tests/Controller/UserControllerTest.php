<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Routing\RouterInterface;

class UserControllerTest extends WebTestCase
{




    public function testList(): void
    {
        $client = static::createClient();
        $container = static::getContainer();
        $router = $container->get('router');
        $client->request('GET', $router->generate('api_v1_user_list'));
        $response = $client->getResponse();

        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
    }
}
