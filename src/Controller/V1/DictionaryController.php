<?php

namespace App\Controller\V1;

use App\Repository\DictionaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DictionaryController extends AbstractController
{
    public function index(DictionaryRepository $dictionaryRepository): JsonResponse
    {
        $dictionaries = $dictionaryRepository->findAll(['name' => 'ASC']);

        return $this->json([
            'data' => $dictionaries
        ], Response::HTTP_OK, [], ['groups' => ['dictionary']]);
    }
}
