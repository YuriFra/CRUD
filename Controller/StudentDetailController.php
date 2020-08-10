<?php
declare(strict_types = 1);

class StudentDetailController
{
    public function render(array $GET, array $POST)
    {
        $loader = new DatabaseLoader();
        $students = $loader->getStudents();

        //load the view
        require 'View/student_detail.php';
    }
}