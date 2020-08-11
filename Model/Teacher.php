<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Teacher extends Person
{
    public function save()
    {
        if ($this->id === null) {
            return $this->add(DatabaseLoader::openConnection());
        }
        $this->update(DatabaseLoader::openConnection());
    }

    private function add(Pdo $pdo): void
    {
        $q = $pdo->prepare('INSERT INTO teacher (firstName, lastName, address, email) VALUES(:firstName, :lastName, :address, :email)');
        $q->bindValue('firstName', $this->getFirstName());
        $q->bindValue('lastName', $this->getLastName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('email', $this->getEmail());
        $q->execute();
        $this->id = (int)$pdo->lastInsertId();
    }

    private function update(Pdo $pdo): void
    {
        $q = $pdo->prepare('UPDATE teacher SET firstName = :firstName, lastName = :lastName, address= :address, email = :email where id = :id');
        $q->bindValue('firstName', $this->getFirstName());
        $q->bindValue('lastName', $this->getLastName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('email', $this->getEmail());
        $q->bindValue('id', $this->id);
        $q->execute();
    }

    public static function delete(Pdo $pdo, $id): void
    {
        $q = $pdo->prepare('DELETE FROM teacher WHERE id = :id');
        $q->bindValue('id', $id);
        $q->execute();
    }
}