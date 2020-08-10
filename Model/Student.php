<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Student extends Person
{
    private int $class_id;

    /**
     * Student constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $address
     * @param string $email
     * @param int $class_id
     * @param int|null $id
     */
    public function __construct(string $firstName, string $lastName, string $address, string $email, int $class_id, ?int $id)
    {
        parent::__construct($firstName, $lastName, $address, $email, $id);
        $this->class_id = $class_id;
    }

    public function getClassId(): int
    {
        return $this->class_id;
    }
}