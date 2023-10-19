<?php

namespace Core\Service;

use Core\Repository\RepositoryInterface;
use Core\Entity\BaseEntity;

abstract class AbstractBaseService
{
    public function __construct(protected RepositoryInterface $repository) {}

    public function getRepository(): RepositoryInterface
    {
        return $this->repository;
    }

    public function create(array $params): BaseEntity
    {
        return $this->repository->getEntityName()::create($params);
    }

    public function update(int $id, array $params): BaseEntity
    {
        return $this->repository->findOrFail($id)
                                ->update($params);
    }

    /**
     * @example $data = ['last_name' => 'last_name'], $criteria = ['id' => 1]
     */
    public function updateOneByCriteria(array $data, array $criteria = []): void
    {
        $this->repository->getEntityName()::where($criteria)
                         ->limit(1)
                         ->update($data);
    }

    /**
     * @example $data = ['last_name' => 'last_name'], $criteria = ['last_name' => 'some_name']
     */
    public function updateByCriteria(array $data, array $criteria = []): void
    {
        $this->repository->getEntityName()::where($criteria)
                         ->update($data);
    }

    public function delete(string|int $id): void
    {
        $this->repository->findOrFail($id)->delete();
    }

    public function deleteOneByCriteria(array $criteria): void
    {
        $this->repository->getEntityName()::where($criteria)
                         ->limit(1)
                         ->delete();
    }

    public function deleteByCriteria(array $criteria): void
    {
        $this->repository->getEntityName()::where($criteria)
                         ->delete();
    }

    public function drop(string|int $id): void
    {
        $this->repository->findOrFail($id)
                         ->forceDelete();
    }

    public function dropOneByCriteria(array $criteria): void
    {
        $this->repository->getEntityName()::where($criteria)
                         ->limit(1)
                         ->forceDelete();
    }

    public function dropByCriteria(array $criteria): void
    {
        $this->repository->getEntityName()::where($criteria)
                         ->forceDelete();
    }
}
