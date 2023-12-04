<?php

namespace App\Controller\V1;

use App\Controller\BaseController;
use App\Entity\Dictionary;
use App\Repository\DictionaryRepository;

use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use OpenApi\Attributes as OA;

class DictionaryController extends BaseController
{
    public function __construct(
        private DictionaryRepository $dictionaryRepository
    ) {

    }

    #[Route('/api/v1/dictionaries', name: "api_v1_dictionary_index", methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'List of available dictionaries',
        content: new OA\JsonContent(
            type: 'array'
            ,
            items: new OA\Items(
                ref: new Model(type: Dictionary::class, groups: ['dictionary'])
            )
        )
    )]


    public function index(): JsonResponse
    {
        $dictionaries = $this->dictionaryRepository->findAll(['name' => 'ASC']);

        return $this->json([
            'data' => $dictionaries
        ], Response::HTTP_OK, [], ['groups' => ['dictionary']]);
    }

    public function create(
        Request $request,
        ValidatorInterface $validator
    )
    {
        $data = $request->toArray();
        $dictionary = new Dictionary();

        $dictionary->setName($data['name'] ?? '');
        $errors = $validator->validate($dictionary);
        if ($errors->count()) {
            return $this->jsonValidationError($errors);
        }


        return $this->jsonSuccess([
            'data' => 'dictionary.create'
        ]);
    }
}
