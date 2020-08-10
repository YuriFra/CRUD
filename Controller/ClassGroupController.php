<?php
declare(strict_types = 1);

class ClassGroupController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            ClassGroup::delete(DatabaseLoader::openConnection(), (int)$_POST['id']);
        }
        $loader = new DatabaseLoader();
        $classes = $loader->getClasses();
        $teachers = $loader->getTeachers();

        //load the view
        require 'View/class.php';
    }
}