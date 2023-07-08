<?php

namespace App\Application\Database;

class Model extends Connection implements ModelInterface
{
    protected int $id;
    protected string $created_at;
    protected string $updated_at;
    protected array $fields = [];

    protected string $table;

    protected array $collection = [];

    public function find(string $columns, mixed $value, bool $many = false): array|bool|Model
    {
        $query = "SELECT * FROM `$this->table` WHERE `$columns` = :$columns LIMIT 1";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$columns => $value]);

        if ($many) {
            $this->collection = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $this->collection;
        } else {
            $entity = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$entity) {
                return false;
            }
            foreach ($entity as $key => $value) {
                $this->$key = $value;
            }
            return $this;
        }

    }

    public function store(): void
    {
        $columns = implode(', ', array_map(function ($field) {
            return "`$field`";
        }, $this->fields));

        $binds = implode(', ', array_map(function ($field) {
            return ":$field";
        }, $this->fields));

        $param = [];
        $query = "INSERT INTO `$this->table` ($columns) VALUES ($binds)";
        $stmt = $this->connect()->prepare($query);
        foreach ($this->fields as $field) {
            $param[$field] = $this->$field;
        }
        $stmt->execute($param);

    }

    public function update(array $data): void
    {
        $keys = array_keys($data);
        $fields = array_map(function ($item){
            return "`$item` = :$item";
        }, $keys);

        $updatedFields = implode(', ', $fields);
        $query = "UPDATE `$this->table` SET $updatedFields WHERE `users` . `id` = :id";

        $stmt = $this->connect()->prepare($query);
        $data['id'] = $this->id;
        $stmt->execute($data);
    }
}