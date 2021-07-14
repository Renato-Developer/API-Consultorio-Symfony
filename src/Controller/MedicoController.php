<?php


namespace App\Controller;

use App\Entity\Medico;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicoController
{
    /**
     * @Route("/medico", methods="POST")
     */
    public function novo(Request $request): Response
    {
        $body = $request->getContent();
        $jsonBody = json_decode($body);
        $medico = new Medico($jsonBody->nome, $jsonBody->crm);
        return new Response(json_encode($medico->getMedico()));
    }
}