<?php

namespace App\Controller\V1;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'This is User index from UserController',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    public function list(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findAll();

        return $this->json([
            'data' => $users
        ]);
    }
}
