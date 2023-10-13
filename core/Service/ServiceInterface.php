<?php

namespace Core\Service;

interface ServiceInterface
{
    public function create(array $params): void;

    public function update(string $uuid, array $params): void;

    public function delete(string $uuid): void;
}
