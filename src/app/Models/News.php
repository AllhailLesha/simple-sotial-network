<?php

namespace App\Models;

use App\Application\Database\Model;

class News extends Model
{
    protected string $tableName = 'news';

    protected array $fields = ['title', 'description', 'image', 'user_id'];

    protected ?string $title;

    protected ?string $description;

    protected ?string $image;

    protected ?int $user_id;

    /**
     * Get the value of tableName
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * Set the value of tableName
     */
    public function setTableName(string $tableName): void
    {
        $this->tableName = $tableName;

    }

    /**
     * Get the value of fields
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Set the value of fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;

    }

    /**
     * Get the value of description
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get the value of image
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;

    }

    /**
     * Get the value of userId
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * Set the value of userId
     */
    public function setUserId(?int $userId): void
    {
        $this->user_id = $userId;

    }
}
