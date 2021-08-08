<?php

namespace App\EventListener;

use App\Helper\FactoryException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class ExceptionHandler implements EventSubscriberInterface
{

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
          KernelEvents::EXCEPTION => [
              ['handleLoginException', 2],
              ['handleEntityException', 1],
              ['handle404Exception', 0],
              ['handleGenericException', -1],
          ],
        ];
    }

    public function handle404Exception(ExceptionEvent $event)
    {
        if($event->getThrowable() instanceof NotFoundHttpException) {
            $event->setResponse(new JsonResponse([
                'Mensagem' => 'erro 404',
            ]));
        }
    }

    public function handleEntityException(ExceptionEvent $event)
    {
        if ($event->getThrowable() instanceof FactoryException) {
            $event->setResponse(new JsonResponse([
                'Mensagem' => 'Erro Na criação da Entidade, favor verificar o nome dos parâmetros enviados',
            ]));
        }
    }

    public function handleLoginException(ExceptionEvent $event)
    {
        if ($event->getThrowable() instanceof AuthenticationException) {
            $event->setResponse(new JsonResponse([
                'Mensagem' => 'Erro ao realizar Login, favor verifique os parâmetros enviados',
            ]));
        }
    }

    public function handleGenericException(ExceptionEvent $event)
    {
        $mensagem = 'Uma execção ocorreu!';
        $this->logger->critical($mensagem . '{stack}', [
            'stack' => $event->getThrowable()->getTraceAsString()
        ]);

        $event->setResponse(new JsonResponse([
            'Mensagem' => $mensagem,
        ]));
    }
}