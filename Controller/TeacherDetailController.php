<?php
declare(strict_types = 1);

class TeacherDetailController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            Teacher::delete(DatabaseLoader::openConnection(), (int)$_POST['id']);
        } else {
            $loader = new DatabaseLoader();
            $teachers = $loader->getTeachers();
            $classes = $loader->getClasses();
            foreach ($classes as $class) {
                if ($class->getTeacherId() === (int)$_GET['id']) {
                    $classId = $class->getId();
                }
            }
            $teacher = $teachers[(int)$_GET['id']];
            $studentList = '';
            if (isset($classId)) {
                $buttonDelete = '';
                $students = $classes[$classId]->getClassStudents(DatabaseLoader::openConnection());
                if (!empty($students[0]['firstName'])) {
                    $studentList = "<ol>";
                    foreach ($students as $student) {
                        $studentList.= "<li><a href='?page=student&id={$student['studentId']}'>{$student['firstName']} {$student['lastName']}</a></li>";
                    }
                    $studentList.= "</ol>";
                }
            } else {
                $buttonDelete = "<form method='post'>
                      <input type='hidden' name='action' value='delete'>
                      <input type='hidden' name='id' value='{$teacher->getId()}'>
                      <button type='submit' class='btn btn-danger'>Delete</button>
                   </form>";
            }
        }

        //load the view
        require 'View/teacher_detail.php';
    }
}