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
     * @param int $class_id
     */
    public function __construct(int $id, string $firstName, string $lastName, string $address, string $email, int $class_id)
    {
        parent::__construct($id,  $firstName, $lastName, $address, $email);
        $this->class_id = $class_id;
    }

    public function getClassId(): int
    {
        return $this->class_id;
    }
}