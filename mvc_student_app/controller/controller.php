<?php
require_once '../model/model.php';

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'add') {
        addStudent($_POST['name'], $_POST['course'], $_POST['year_level']);
    } 
    elseif ($action === 'update') {
        updateStudent($_POST['id'], $_POST['name'], $_POST['course'], $_POST['year_level']);
    }

} else{
    if ($action === 'delete') {
        deleteStudent($_GET['id']);
    }   
    
}

header("Location: ../view/view.php");
exit();
?>