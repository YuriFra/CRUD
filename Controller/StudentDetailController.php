<?php
declare(strict_types = 1);

class StudentDetailController
{
    public function render(array $GET, array $POST)
    {
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            Student::delete(DatabaseLoader::openConnection(), (int)$_POST['id']);
        } else {
            $loader = new DatabaseLoader();
            $classes = $loader->getClasses();
            $students = $loader->getStudents();
            $teachers = $loader->getTeachers();
            $student = $students[(int)$_GET['id']];
            $className = '';
            $teacherName = '';
            if ($student->getClassId() !== 0) {
                $class = $classes[$student->getClassId()];
                $className = "<a href='?page=class&id={$class->getId()}'>{$class->getName()}</a>";

                if ($class->getTeacherId() !== 0) {
                    $teacher = $teachers[$class->getTeacherId()];
                    $teacherName = "<a href='?page=teacher&id={$teacher->getId()}'>{$teacher->getFullName()}</a>";
                }
            }
        }
        //load the view
        require 'View/student_detail.php';
    }
}