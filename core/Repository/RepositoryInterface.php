<?php

namespace Core\Repository;

use Illuminate\Support\Collection;
use Core\Entity\BaseEntity;

interface RepositoryInterface
{
    public function all(): Collection;

    public function find(string $uuid): BaseEntity|null;

    public function findBy(array $params): Collection;
}
