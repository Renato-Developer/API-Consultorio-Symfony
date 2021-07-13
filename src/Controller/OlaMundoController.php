<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OlaMundoController
{
    /**
     * @Route("/ola")
     */
    public function olaMundoAction(Request $request): Response
    {
        $pathInfo = $request->getPathInfo();
        //$queryString = $request->getQueryString();
        $queryString = $request->query->all();
        $response = [
            'Mensagem' => 'Ola Mundo!',
            'path-info' => $pathInfo,
            'query-string' => $queryString
        ];
        return new JsonResponse($response, 200, );
    }
}