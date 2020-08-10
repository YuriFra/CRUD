<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Teacher extends Person
{
    public function save()
    {
        if ($this->id === 0) {
            return $this->add();
        }
        $this->update();
    }

    public function add(Pdo $pdo)
    {
        $q = $pdo->prepare('INSERT INTO teacher (firstName, lastName, address, email) VALUES(:firstName, :lastName, :address, :email)');
        $q->bindValue('firstName', $this->getFirstName());
        $q->bindValue('lastName', $this->getLastName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('email', $this->getEmail());
        $q->execute();
        $this->id = (int)$pdo->lastInsertId();
    }

    public function update(Pdo $pdo)
    {
        $q = $pdo->prepare('UPDATE teacher SET firstName = :firstName, lastName = :lastName, address= :address, email = :email where id = :id');
        $q->bindValue('firstName', $this->getFirstName());
        $q->bindValue('lastName', $this->getLastName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('email', $this->getEmail());
        $q->bindValue('id', $this->id);
        $q->execute();
    }
}