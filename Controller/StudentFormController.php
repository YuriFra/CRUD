<?php
declare(strict_types = 1);

class StudentFormController
{
    public function render(array $GET, array $POST)
    {
        $loader = new DatabaseLoader();
        $classes = $loader->getClasses();

        if($_POST['action'] === 'add') {
            $student = new Student("", "", "", "", );
            if (isset($_POST['id']) && empty($_POST['id'])) {
                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $address = htmlspecialchars($_POST['address']);
                $email = htmlspecialchars($_POST['email']);
                $class_id = $_POST['class_id'];
                $student = new Student($firstName, $lastName, $address, $email, (int)$class_id);
                $student->save();
                $msg = "Data saved.";
            }
            $action = 'add';

        } else {
            $action ='update';
            $loader = new DatabaseLoader();
            $students = $loader->getStudents();
            $student = $students[(int)$_POST['id']];
            if (isset($_POST['submit'])) {
                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $address = htmlspecialchars($_POST['address']);
                $email = htmlspecialchars($_POST['email']);
                $class_id = $_POST['class_id'];
                $student = new Student($firstName, $lastName, $address, $email, (int)$class_id, (int)$_POST['id']);
                $student->save();
                $msg = "Update saved.";
            }
        }

        //load the view
        require 'View/student_form.php';
    }
}