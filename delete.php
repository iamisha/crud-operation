<?php

include 'connection.php';

$id = $_GET['id'];
$delete_query = "delete from user where id = '$id'";
$delete_exec = mysqli_query($conn,$delete_query);

if($delete_exec){
    header('location:index.php');
}

?>