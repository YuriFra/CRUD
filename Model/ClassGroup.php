<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class ClassGroup
{
    private int $id;
    private string $name;
    private string $address;
    private int $teacher_id;

    /**
     * ClassGroup constructor.
     * @param int $id
     * @param string $name
     * @param string $address
     * @param int $teacher_id
     */
    public function __construct(int $id, string $name, string $address, int $teacher_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->teacher_id = $teacher_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getTeacherId(): int
    {
        return $this->teacher_id;
    }
}