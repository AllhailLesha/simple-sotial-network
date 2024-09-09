<?php

namespace App\Application\Database;

use PDO;

class Model extends Connection implements ModelInterface
{
    protected int $id;

    protected string $created_at;

    protected string $updated_at;

    protected ?string $token = null;

    protected array $fields = [];

    protected string $tableName;

    protected array $collection = [];

    public function find(string $column, mixed $value, bool $many = false): array|bool|Model
    {
        $query = "SELECT * FROM $this->tableName WHERE `$column` = :$column";
        $stmt = self::connect()->prepare($query);
        $stmt->execute([$column => $value]);

        if ($many) {
            $this->collection = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $this->collection;
        } else {
            $entity = $stmt->fetch(PDO::FETCH_ASSOC);

            if (! $entity) {
                return false;
            } else {
                foreach ($entity as $key => $value) {
                    $this->$key = $value;
                }
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

        $query = "INSERT INTO `{$this->tableName}`({$columns}) VALUES ({$binds})";
        $pdo = $this->connect();
        $stmt = $pdo->prepare($query);

        $params = [];
        foreach ($this->fields as $field) {
            $params[$field] = $this->$field;
        }

        try {
            $stmt->execute($params);
        } catch (PDO $exception) {
            echo $exception->getMessage();
        }
    }

    public function update(array $data): void
    {
        $keys = array_keys($data);

        $fields = array_map(function ($item) {
            return "`$item` = :$item";
        }, $keys);

        $updatedFields = implode(', ', $fields);

        $query = "UPDATE `$this->tableName` SET $updatedFields WHERE `id` = :id";
        $stmt = $this->connect()->prepare($query);
        $data['id'] = $this->id;
        $stmt->execute($data);
    }
}
