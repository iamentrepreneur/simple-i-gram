<?php

namespace App\Application\Database;

class Model extends Connection implements ModelInterface
{
    /**
     * @var int
     */
    protected int $id;
    /**
     * @var string
     */
    protected ?string $created_at;

    /**
     * @var string
     */
    protected ?string $updated_at;
    /**
     * @var array
     */
    protected array $fields = [];

    /**
     * @var string
     */
    protected string $table;

    /**
     * @var array
     */
    protected array $collection = [];

    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $columns
     * @param mixed $value
     * @param bool $many
     * @return array|bool|Model|$this
     */
    public function find(string $columns, mixed $value, bool $many = false): array|bool|Model
    {
        $query = "SELECT * FROM `$this->table` WHERE `$columns` = :$columns";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$columns => $value]);

        if ($many) {
            $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($items as $item) {
                foreach ($item as $key => $value) {
                    $this->$key = $value;
                }
                $this->collection[] = clone $this;
            }
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

    public function all(): array
    {
        $items = $this->connect()->query("SELECT * FROM `$this->table` ORDER BY id DESC")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($items as $item) {
            foreach ($item as $key => $value) {
                $this->$key = $value;
            }
            $this->collection[] = clone $this;
        }
        return $this->collection;
    }
    
    /**
     * @return void
     */
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

    /**
     * @param array $data
     * @return void
     */
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
    /**
     * @return string
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

}