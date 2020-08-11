<?php
declare(strict_types = 1);

class ClassGroupFormController
{
    public function render(array $GET, array $POST)
    {
        $loader = new DatabaseLoader();
        $teachers = $loader->getTeachers();

        if($_POST['action'] === 'add') {
            $class = new ClassGroup("", "");
            if (isset($_POST['id']) && empty($_POST['id'])) {
                $name = htmlspecialchars($_POST['name']);
                $address = htmlspecialchars($_POST['address']);
                $teacherId = (int)$_POST['teacher_id'] !== 0 ? (int)$_POST['teacher_id'] : null;
                $class = new ClassGroup($name, $address, null, $teacherId);
                $class->save();
                $msg = "Data saved.";
            }
            $action = 'add';

        } else {
            $action ='update';
            $classes = $loader->getClasses();
            $class = $classes[(int)$_POST['id']];
            if (isset($_POST['submit'])) {
                $name = htmlspecialchars($_POST['name']);
                $address = htmlspecialchars($_POST['address']);
                $teacherId = isset($_POST['teacher_id']) ? (int)$_POST['teacher_id'] : null;
                $class = new ClassGroup($name, $address,(int)$_POST['id'], $teacherId);
                $class->save();
                $msg = "Update saved.";
            }
        }
        require 'View/class_form.php';
    }
}