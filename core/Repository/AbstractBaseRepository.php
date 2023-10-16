<?php

namespace Core\Repository;

use Core\Exceptions\NotFoundException;
use Illuminate\Support\Collection;
use Core\Entity\BaseEntity;

abstract class AbstractBaseRepository
{
    public function __construct(protected string $entityName) {}

    public function getEntityName(): string
    {
        return $this->entityName;
    }

    //////////////////////////////////////////////////////////////////////////////

    public function all(): Collection
    {
        return $this->entityName::all();
    }

    public function find(string|int $id): BaseEntity|null
    {
        return $this->entityName::find($id);
    }

    public function findOrFail(string|int $id): BaseEntity
    {
        return $this->find($id) ?: throw new NotFoundException();
    }

    public function findBy(array $criteria = []): Collection
    {
        return $this->entityName::where($criteria)->get();
    }

    public function findOneBy(array $criteria = []): BaseEntity|null
    {
        return $this->entityName::where($criteria)->first();
    }

    public function findOneByOrFail(array $criteria = []): BaseEntity
    {
        return $this->findOneBy($criteria) ?: throw new NotFoundException();
    }

    public function findIn(string $key, array $values = []): Collection
    {
        return $this->entityName::whereIn($key, $values)->get();
    }
}
