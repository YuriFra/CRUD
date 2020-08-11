<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class ClassGroup
{
    private ?int $id;
    private string $name;
    private string $address;
    private ?int $teacher_id;

    public function __construct(string $name, string $address, ?int $id = null, ?int $teacher_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->teacher_id = $teacher_id;
    }

    public function getId(): ?int
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

    public function getTeacherId(): ?int
    {
        return $this->teacher_id;
    }

    public function save()
    {
        if ($this->id === null) {
            $this->add(DatabaseLoader::openConnection());
            return;
        }
        $this->update(DatabaseLoader::openConnection());
    }

    public function add(Pdo $pdo)
    {
        $q = $pdo->prepare('INSERT INTO class (name, address, teacher_id) VALUES (:name, :address, :teacher_id)');
        $q->bindValue('name', $this->getName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('teacher_id', $this->getTeacherId());
        $q->execute();
        $this->id = (int)$pdo->lastInsertId();
    }

    public function update(Pdo $pdo)
    {
        $q = $pdo->prepare('UPDATE class SET name = :name, address= :address, teacher_id = :teacher_id WHERE id = :id');
        $q->bindValue('name', $this->getName());
        $q->bindValue('address', $this->getAddress());
        $q->bindValue('teacher_id', $this->getTeacherId());
        $q->bindValue('id', $this->id);
        $q->execute();
    }

    public static function delete(Pdo $pdo, $id)
    {
        $q = $pdo->prepare('DELETE FROM class WHERE id = :id');
        $q->bindValue('id', $id);
        $q->execute();
    }

    public function getClassStudents(Pdo $pdo)
    {
        $q = $pdo->prepare('SELECT student.firstName, student.lastName, student.id as studentId FROM class 
        LEFT JOIN student on class.id = student.class_id
        WHERE class.id = :id');
        $q->bindValue('id', $this->getId());
        $q->execute();
        return $q->fetchAll();
    }
}