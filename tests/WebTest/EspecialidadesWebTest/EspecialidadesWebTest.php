<?php

namespace App\tests\WebTest\EspecialidadesWebTest;

use http\Client;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EspecialidadesWebTest extends WebTestCase
{
    public function testGaranteQueRequisicaoFalhaSemAutenticacao(): void
    {
        $client = static::createClient();
        $client->request('GET', '/especialidades');

        self::assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testGaranteQueEspecialidadesSaoListadas(): void
    {
        $client = static::createClient();
        $token = $this->login($client);
        $client->request('GET', '/especialidades', [], [], [
            'HTTP_AUTHORIZATION' => 'Bearer ' . $token,
        ]);

        $codigoRetorno = json_decode($client->getResponse()->getStatusCode());

        self::assertEquals(200, $codigoRetorno);
    }

    public function testInsereEspecialidade()
    {
        $client = static::createClient();
        $token = $this->login($client);
        $client->request('POST', '/especialidades', [], [], [
            'HTTP_AUTHORIZATION' => 'Bearer ' . $token,
            'CONTENT_TYPE' => 'application/json',
        ], json_encode([
            'descricao' => 'TestEspecialidade',
        ]));

        $statusCode = $client->getResponse()->getStatusCode();

        self::assertEquals(201, $statusCode);
    }

    private function login(KernelBrowser $client)
    {
        $client->request(
            'POST',
            'login',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode([
                'username' => 'Renato2',
                'password' => 123456
            ])
        );

        $token = json_decode($client->getResponse()->getContent());
        return $token->access_token;
    }

    public function testH1Especialidades()
    {
        $client = self::createClient();
        $client->request('GET', '/especialidades-html');

        self::assertSelectorTextContains('h1', 'Especialidades');
        self::assertSelectorExists('.especialidade');
    }
}