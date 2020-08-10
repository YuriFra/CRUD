<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Person
{
    protected int $id;
    protected string $firstName;
    protected string $lastName;
    protected string $address;
    protected string $email;

    /**
     * Person constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $address
     * @param string $email
     */
    public function __construct(int $id, string $firstName, string $lastName, string $address, string $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFullName()
    {
        return $this->firstName.' '.$this->lastName;
    }
}