<?php 

// $isha=null;

// if(isset($isha)){
//     echo "isha value is set";
// }
// else{
//     echo "isha value is not set";
// }

// $isha=1;

// if(isset($isha)){
//     echo "isha value is set";
// }
// else{
//     echo "isha value is not set";
// }

include 'connection.php';
$msg=0;
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];

    $insert_query = "insert into user (name,address) values ('$name','$address')";
    $insert_exec = mysqli_query($conn,$insert_query);

    if($insert_exec){
       $msg=1;

       header('location:index.php');
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1,
        p {
            text-align: center;

        }

        input {
            padding: 5px;
            height: 50px;
            width: 200px;
        }
    </style>

</head>

<body>
    <h1>Enter the details</h1>
    <p><?php if($msg==1){echo "The value is inserted into database";}?></p>
    <hr>
    <form action="#" method="post">

        <p>Enter Name = <input type="text" name="name"></p>

        <p>Enter Address = <input type="text" name="address"></p>
        <p><input type="submit" value="submit to database" name="submit" value="submit"></p>
    </form>
    <hr>
    <h1>The data from database are = </h1>
    <p>

        <?php 

$select_query = "select * from user";

$select_exec = mysqli_query($conn,$select_query);

$row_count= mysqli_num_rows($select_exec);

if($row_count==0){
    echo "no data exist in database";
}

while($row = mysqli_fetch_assoc($select_exec)){
    echo "Name is = " . $row['name'] . " Address is = ". $row['address']  . " Timestamp is " .$row['reg_date']. "<a href='delete.php?id=". $row['id'] ." '>Delete  this</a> " . "<a href='edit.php?id=". $row['id'] ." '> Edit  this</a> " . "<br/>";
}

?>

    </p>
</body>

</html>