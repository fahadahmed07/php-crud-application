<?php

session_start();

include 'config.php';

$id = 0;
$update = false;
$task = '';

// Add Task in the database
if (isset($_POST['add'])) {
    $task = $_POST['task'];

    $mysqli->query("INSERT INTO crud_data (task) VALUES ('$task')") or die($mysqli->error());

    $_SESSION['message'] = "Task successfully added!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

// Delete task from the database
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM crud_data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Task successfully deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

// Get the task from database
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $update = true;
    $result = $mysqli->query("SELECT * FROM crud_data WHERE id=$id") or die($mysqli->error());
    
    if (count($result) == 1) {
        $row = $result->fetch_array();
        $task = $row['task'];
    }
}

// Update task in the database
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $task = $_POST['task'];

    $mysqli->query("UPDATE crud_data SET task='$task' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Task has been successfully updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: index.php");
}