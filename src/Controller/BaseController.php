<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class BaseController extends AbstractController
{

    public function jsonSuccess($data, array $groups = [])
    {
        return $this->json([
                'data' => $data,
                'errors' => []
            ],
            Response::HTTP_OK,
            [], ['groups' => $groups]
        );
    }
    public function jsonValidationError(ConstraintViolationListInterface $errors)
    {
        $response = [];

        // print_r($errors);
        foreach ($errors as $error) {
            $response[$error->getPropertyPath()] = $error->getMessage();
        }

        return $this->json([
                'data' => [],
                'errors' => $response
            ],
            Response::HTTP_BAD_REQUEST,
            [],
        );
    }
}