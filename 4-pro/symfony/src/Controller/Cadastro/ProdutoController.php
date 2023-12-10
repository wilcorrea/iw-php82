<?php

declare(strict_types=1);

namespace App\Controller\Cadastro;

use App\Repository\ProdutoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProdutoController
{
    public function __construct(private readonly ProdutoRepository $produtoRepository)
    {
    }

    public function index()
    {
        return new JsonResponse($this->produtoRepository->findAll());
    }
}
