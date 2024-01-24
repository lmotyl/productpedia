<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DictionaryControllerTest extends ControllerTest
{
    public function testIndex(UserRepository $userRepository): void
    {
        $user = $userRepository->findOneBy([ 'email' => 'admin@admin.com']);
        $client = $this->createAuthenticateClient($user);
        $container = static::getContainer();
        $router = $container->get('router');
        $client->request('GET', $router->generate('api_v1_dictionary_index'));
        $response = $client->getResponse();

        $this->assertResponseIsSuccessful();
        $this->isJson($response->getContent());
        $json = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('data', $json);
        $firstEntry = array_shift($json['data']) ?? [];
        $this->assertArrayHasKey('name', $firstEntry);
        $this->assertArrayHasKey('id', $firstEntry);
    }
}
