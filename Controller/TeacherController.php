<?php
declare(strict_types = 1);

class TeacherController
{
    public function render(array $GET, array $POST)
    {
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            Teacher::delete(DatabaseLoader::openConnection(), (int)$_POST['id']);
        }
        $loader = new DatabaseLoader();
        $teachers = $loader->getTeachers();

        //load the view
        require 'View/teacher.php';
    }
}