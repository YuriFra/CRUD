<?php
declare(strict_types = 1);

class ClassGroupFormController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //this is just example code, you can remove the line below
        if($_POST['action'] === 'add') {
            $class = new ClassGroup("", "");
            if (isset($_POST['id']) && empty($_POST['id'])) {
                $name = htmlspecialchars($_POST['name']);
                $address = htmlspecialchars($_POST['address']);
                $class = new ClassGroup($name, $address);
                $class->save();
                $msg = "Data saved.";
            }
            $action = 'add';

        } else {
            $action ='update';
            $loader = new DatabaseLoader();
            $classes = $loader->getClasses();
            $class = $classes[(int)$_POST['id']];
            if (isset($_POST['submit'])) {
                $name = htmlspecialchars($_POST['name']);
                $address = htmlspecialchars($_POST['address']);
                $class = new ClassGroup($name, $address,(int)$_POST['id']);
                $class->save();
                $msg = "Update saved.";
            }
        }



        //load the view
        require 'View/class_form.php';
    }
}