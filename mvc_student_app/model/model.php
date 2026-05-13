<?php
require_once '../config/config.php';

function getAllStudents(){
    global $conn;
    return $conn->query("SELECT * FROM students");
}

function addStudent($name, $course, $year_level){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO students(name, course, year_level) VALUES(?, ?, ?)");
    $stmt->bind_param("ssi", $name, $course, $year_level);
    return $stmt->execute();
}

function updateStudent($id, $name, $course, $year_level){
    global $conn;
    $stmt = $conn->prepare("UPDATE students SET name = ?, course = ?, year_level = ? WHERE id = ?");
    $stmt->bind_param("ssii", $name, $course, $year_level, $id);
    return $stmt->execute();
}

function deleteStudent($id){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

?>