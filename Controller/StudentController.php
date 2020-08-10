<?php
declare(strict_types = 1);

class StudentController
{
    public function render(array $GET, array $POST)
    {
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            Student::delete(DatabaseLoader::openConnection(), (int)$_POST['id']);
        }
        $loader = new DatabaseLoader();
        $students = $loader->getStudents();

        //load the view
        require 'View/student.php';
    }
}