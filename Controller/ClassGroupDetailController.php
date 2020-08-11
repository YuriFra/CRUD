<?php
declare(strict_types = 1);

class ClassGroupDetailController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            ClassGroup::delete(DatabaseLoader::openConnection(), (int)$_POST['id']);
        } else {
            $loader = new DatabaseLoader();
            $classes = $loader->getClasses();
            $teachers = $loader->getTeachers();
            $class = $classes[$_GET['id']];
            $teacherName = '';
            if ($class->getTeacherId() !== 0) {
                $teacher = $teachers[$class->getTeacherId()];
                $teacherName = "<a href='?page=teacher&id={$teacher->getId()}'>{$teacher->getFullName()}</a>";
            }
            $studentList = '';
            $students = $class->getClassStudents(DatabaseLoader::openConnection());
            if (!empty($students[0]['firstName'])) {
                $studentList = "<ol>";
                foreach ($students as $student) {
                    $studentList.= "<li><a href='?page=student&id={$student['studentId']}'>{$student['firstName']} {$student['lastName']}</a></li>";
                }
                $studentList.= "</ol>";
            }
        }



        //load the view
        require 'View/class_detail.php';
    }
}