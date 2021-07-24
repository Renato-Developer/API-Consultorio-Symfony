<?php


namespace App\Helper;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseFactory
{
    private bool $sucesso;
    private $conteudoResposta;
    private $paginaAtual;
    private $itensPorPagina;
    private $statusCode;

    public function __construct(
        bool $sucesso,
        $conteudoResposta,
        $statusCode = Response::HTTP_OK,
        int $paginaAtual = null,
        int $itensPorPagina = null
    ) {

        $this->sucesso = $sucesso;
        $this->conteudoResposta = $conteudoResposta;
        $this->paginaAtual = $paginaAtual;
        $this->itensPorPagina = $itensPorPagina;
        $this->statusCode = $statusCode;
    }

    public function getResponse()
    {
        $resposta = [
            'sucesso' => $this->sucesso,
            'paginaAtual' => $this->paginaAtual,
            'itensPorPagina' => $this->itensPorPagina,
            'conteudoResposta' => $this->conteudoResposta
        ];

        if(is_null($this->paginaAtual)) {
            unset($resposta['paginaAtual']);
            unset($resposta['itensPorPagina']);
        }

        return new JsonResponse($resposta, $this->statusCode);
    }
}