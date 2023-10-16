<?php

namespace Core\Repository;

use Illuminate\Support\Collection;
use Core\Entity\BaseEntity;

interface RepositoryInterface
{
    public function getEntityName(): string;

    public function all(): Collection;

    public function find(string|int $id): BaseEntity|null;

    public function findOrFail(string|int $id): BaseEntity;

    public function findBy(array $criteria = []): Collection;

    public function findOneBy(array $criteria = []): BaseEntity|null;

    public function findOneByOrFail(array $criteria = []): BaseEntity;

    public function findIn(string $key, array $values = []): Collection;
}
