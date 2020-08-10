<?php
declare(strict_types = 1);

class TeacherFormController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //this is just example code, you can remove the line below
        if($_POST['action'] === 'add') {
            $action = 'add';
            if (isset($_POST['id'])) {
                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $address = htmlspecialchars($_POST['address']);
                $email = htmlspecialchars($_POST['email']);
                $teacher = new Teacher($firstName, $lastName, $address, $email);
                $teacher->save();
            }
        } else {
            $action ='update';
        }

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/teacher_form.php';
    }
}