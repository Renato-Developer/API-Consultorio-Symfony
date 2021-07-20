<?php


namespace App\Controller;


use App\Helper\EntityFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends AbstractController
{
    protected EntityManagerInterface $entityManager;
    protected ObjectRepository $repository;
    protected EntityFactoryInterface $entityFactory;

    public function __construct(EntityManagerInterface $entityManager, ObjectRepository $repository, EntityFactoryInterface $entityFactory)
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->entityFactory = $entityFactory;
    }

    public function novo(Request $request): Response
    {
        $bodyRequest = $request->getContent();
        $entity = $this->entityFactory->criar($bodyRequest);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return new JsonResponse($entity);
    }

    public function buscarTodos(): Response
    {
        $entityList = $this->repository->findAll();
        return new JsonResponse($entityList);
    }

    public function buscarPorId(int $id): Response
    {
        $entity = $this->repository->find($id);
        $statusCode = is_null($entity) ? Response::HTTP_NO_CONTENT : 200;
        return new JsonResponse($entity, $statusCode);
    }

    public function atualizar(int $id, Request $request): Response
    {
        $bodyRequest = $request->getContent();
        $entidadeEnviada = $this->entityFactory->criar($bodyRequest);

        $entidadeExistente = $this->repository->find($id);
        if (is_null($entidadeExistente)) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }

        $this->atualizarEntidade($entidadeExistente, $entidadeEnviada);

        $this->entityManager->flush();

        return new JsonResponse($entidadeExistente);
    }

    public function remover(int $id): Response
    {
        $entity = $this->repository->find($id);
        if (is_null($entity)) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
        return new Response('', 200);
    }

    abstract public function atualizarEntidade($entidadeExistente, $entidadeEnviada);
}