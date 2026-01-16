<?php
namespace App\Models;
class Role
{
    private ?int $id;
    private string $name;

    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}