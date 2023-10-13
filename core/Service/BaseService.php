<?php

namespace Core\Service;

use Core\Repository\RepositoryInterface;

abstract class BaseService
{
    public function __construct(protected RepositoryInterface $repository) {}

    public function getRepository(): RepositoryInterface
    {
        return $this->repository;
    }

    public function create(array $params): void
    {
        // TODO: Implement create() method.
    }

    public function update(string $uuid, array $params): void
    {
        // TODO: Implement update() method.
    }

    public function delete(string $uuid): void
    {
        // TODO: Implement delete() method.
    }
}
