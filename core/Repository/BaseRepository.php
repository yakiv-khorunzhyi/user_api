<?php

namespace Core\Repository;

use Illuminate\Support\Collection;
use Core\Entity\BaseEntity;

abstract class BaseRepository
{
    public function __construct(protected string $entityName) {}

    public function getEntityName(): string
    {
        return $this->entityName;
    }

    public function all(): Collection
    {
        return $this->entityName::all();
    }

    public function find(string $uuid): BaseEntity|null
    {
        // TODO: Implement find() method.
    }

    public function findBy(array $params): Collection
    {
        // TODO: Implement findBy() method.
    }
}
