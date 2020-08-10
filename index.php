<?php
declare(strict_types=1);

//include all model files
require 'Model/DatabaseLoader.php';
require 'Model/ClassGroup.php';
require 'Model/Person.php';
require 'Model/Student.php';
require 'Model/Teacher.php';
//include all controllers
require 'Controller/HomepageController.php';
require 'Controller/ClassGroupController.php';
require 'Controller/ClassGroupDetailController.php';
require 'Controller/ClassGroupFormController.php';
require 'Controller/StudentController.php';
require 'Controller/StudentDetailController.php';
require 'Controller/StudentFormController.php';
require 'Controller/TeacherController.php';
require 'Controller/TeacherDetailController.php';
require 'Controller/TeacherFormController.php';

$controller = new HomepageController();
if(isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'class':
            $controller = new ClassGroupController();
            if (isset($_GET['id'])) {
                $controller = new ClassGroupDetailController();
            }
            if(isset($_POST['action'])) {
                switch ($_POST['action']){
                    case 'delete':
                        break;
                    case 'add':
                    case 'update':
                        $controller = new ClassGroupFormController();
                        break;
                }
            }
            break;
        case 'teacher':
            $controller = new TeacherController();
            if (isset($_GET['id'])) {
                $controller = new TeacherDetailController();
            }
            if(isset($_POST['action'])) {
                switch ($_POST['action']){
                    case 'delete':
                        break;
                    case 'add':
                    case 'update':
                        $controller = new TeacherFormController();
                        break;
                }
            }
            break;
        case 'student':
            $controller = new StudentController();
            if (isset($_GET['id'])) {
                $controller = new StudentDetailController();
            }
            if(isset($_POST['action'])) {
                switch ($_POST['action']){
                    case 'delete':
                        break;
                    case 'add':
                    case 'update':
                        $controller = new StudentFormController();
                        break;
                }
            }
            break;
    }
}
$controller->render($_GET, $_POST);