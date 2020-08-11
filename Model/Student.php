<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Student extends Person
{
    private ?int $class_id;

    public function __construct(string $firstName, string $lastName, string $address, string $email, ?int $class_id = null, ?int $id = null)
    {
        parent::__construct($firstName, $lastName, $address, $email, $id);
        $this->class_id = $class_id;
    }

    public function getClassId(): int
    {
        return $this->class_id;
    }

    public function save()
    {
        if ($this->id === null) {
            return $this->add(DatabaseLoader::openConnection());
        }
        $this->update(DatabaseLoader::openConnection());
    }

    public function add(Pdo $pdo)
    {
        $q = $pdo->prepare('INSERT INTO student (firstName, lastName, address, email, class_id) VALUES(:firstName, :lastName, :address, :email, :class_id)');
        $q->bindValue('firstName', $this->getFirstName());
        $q->bindValue('lastName', $this->getLastName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('email', $this->getEmail());
        $q->bindValue('class_id', $this->getClassId());
        $q->execute();
        $this->id = (int)$pdo->lastInsertId();
    }

    public function update(Pdo $pdo)
    {
        $q = $pdo->prepare('UPDATE student SET firstName = :firstName, lastName = :lastName, address= :address, email = :email, class_id = :class_id where id = :id');
        $q->bindValue('firstName', $this->getFirstName());
        $q->bindValue('lastName', $this->getLastName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('email', $this->getEmail());
        $q->bindValue('class_id', $this->getClassId());
        $q->bindValue('id', $this->id);
        $q->execute();
    }

    public static function delete(Pdo $pdo, $id)
    {
        $q = $pdo->prepare('DELETE FROM student WHERE id = :id');
        $q->bindValue('id', $id);
        $q->execute();
    }
}