<?php


namespace App\Helper;


use Symfony\Component\HttpFoundation\Request;

class ExtratorDeDadosDoRequest
{
    private function buscaDadosRequest(Request $request)
    {
        $queryString = $request->query->all();
        $informacoesDeOrdenacao = array_key_exists('sort',$queryString)
            ? $queryString['sort']
            : null;
        unset($queryString['sort']);

        $paginaAtual = array_key_exists('page', $queryString)
            ? $queryString['page']
            : 1;
        unset($queryString['page']);

        $itensPorPagina = array_key_exists('itensPorPagina', $queryString)
            ? $queryString['itensPorPagina']
            : 5;
        unset($queryString['itensPorPagina']);

        return [$informacoesDeOrdenacao, $queryString, $paginaAtual, $itensPorPagina];
    }
    
    public function buscaDadosOrdenacao(Request $request)
    {
        [$informacoesDeOrdenacao, ] = $this->buscaDadosRequest($request);
        return $informacoesDeOrdenacao;
    }

    public function buscaDadosFiltro(Request $request)
    {
        [, $informacoesDeFiltro] = $this->buscaDadosRequest($request);
        return $informacoesDeFiltro;
    }

    public function buscaDadosPaginacao(Request $request)
    {
        [, , $paginaAtual, $itensPorPagina] = $this->buscaDadosRequest($request);
        return [$paginaAtual, $itensPorPagina];
    }
}