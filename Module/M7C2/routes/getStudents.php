<?php


require_once "../classes/Database.php";
require_once "../classes/Student.php";


$db = new Database();

$student = new Student($db);


echo $student->getStudents();


?>