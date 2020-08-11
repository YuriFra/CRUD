<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class  DatabaseLoader
{
    private array $classes = [];
    private array $teachers = [];
    private array $students = [];

    /**
     * DatabaseLoader constructor.
     */
    public function __construct()
    {
        if (empty($this->classes) && empty($this->students) && empty($this->teachers)) {
            $pdo = $this->openConnection();
            $getClasses = $pdo->prepare('SELECT * FROM class');
            $getClasses->execute();
            $classes = $getClasses->fetchAll();
            foreach ($classes as $class) {
                $this->classes[$class['id']] = new ClassGroup($class['name'], $class['address'], (int)$class['id'], (int)$class['teacher_id']);
            }
            $getTeachers = $pdo->prepare('SELECT * FROM teacher');
            $getTeachers->execute();
            $teachers = $getTeachers->fetchAll();
            foreach ($teachers as $teacher) {
                $this->teachers[$teacher['id']] = new Teacher($teacher['firstName'], $teacher['lastName'], $teacher['address'], $teacher['email'], (int)$teacher['id']);
            }
            $getStudents = $pdo->prepare('SELECT * FROM student');
            $getStudents->execute();
            $students = $getStudents->fetchAll();
            foreach ($students as $student) {
                $this->students[$class['id']] = new Student($student['firstName'], $student['lastName'], $student['address'], $student['email'], (int)$student['class_id'], (int)$student['id']);
            }
        }
    }

    public static function openConnection(): PDO
    {
        $dbhost = "localhost";
        $dbuser = DB_USER;
        $dbpass = DB_PASS;
        $db = DB_NAME;

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    }

    public function getClasses(): array
    {
        return $this->classes;
    }

    public function getTeachers(): array
    {
        return $this->teachers;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

}
