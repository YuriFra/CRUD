<?php
declare(strict_types = 1);

class TeacherFormController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //this is just example code, you can remove the line below
        if($_POST['action'] === 'add') {
            $teacher = new Teacher("", "", "", "");
            if (isset($_POST['id']) && empty($_POST['id'])) {
                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $address = htmlspecialchars($_POST['address']);
                $email = htmlspecialchars($_POST['email']);
                $teacher = new Teacher($firstName, $lastName, $address, $email);
                $teacher->save();
                $msg = "Data saved.";
            }
            $action = 'add';

        } else {
            $action ='update';
            $loader = new DatabaseLoader();
            $teachers = $loader->getTeachers();
            $teacher = $teachers[(int)$_POST['id']];
            if (isset($_POST['submit'])) {
                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $address = htmlspecialchars($_POST['address']);
                $email = htmlspecialchars($_POST['email']);
                $teacher = new Teacher($firstName, $lastName, $address, $email, (int)$_POST['id']);
                $teacher->save();
                $msg = "Update saved.";
            }
        }


        //load the view
        require 'View/teacher_form.php';
    }
}