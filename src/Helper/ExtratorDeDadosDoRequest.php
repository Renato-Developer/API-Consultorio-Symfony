<?php


namespace App\Helper;


use Symfony\Component\HttpFoundation\Request;

class ExtratorDeDadosDoRequest
{
    private function buscaDadosRequest(Request $request)
    {
        $informacoesDeOrdenacao = $request->get('sort');
        $informacoesDeFiltro = $request->query->all();
        unset($informacoesDeFiltro['sort']);

        return [$informacoesDeOrdenacao, $informacoesDeFiltro];
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
}