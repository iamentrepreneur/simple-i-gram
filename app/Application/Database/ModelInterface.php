<?php

namespace App\Application\Database;

interface ModelInterface
{
    public function find(string $columns, mixed $value, bool $many = false): array|bool|Model;

    public function store(): void;

    public function update(array $data): void;
}