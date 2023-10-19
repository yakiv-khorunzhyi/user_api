<?php

namespace Core\Service;

use Core\Repository\RepositoryInterface;
use Core\Entity\BaseEntity;

interface ServiceInterface
{
    public function getRepository(): RepositoryInterface;

    public function create(array $params): BaseEntity;

    public function update(int $id, array $params): BaseEntity;

    public function updateOneByCriteria(array $data, array $criteria = []): void;

    public function updateByCriteria(array $data, array $criteria = []): void;

    public function delete(string|int $id): void;

    public function deleteOneByCriteria(array $criteria): void;

    public function deleteByCriteria(array $criteria): void;

    public function drop(string|int $id): void;

    public function dropOneByCriteria(array $criteria): void;

    public function dropByCriteria(array $criteria): void;
}
