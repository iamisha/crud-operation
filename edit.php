<?php 


include 'connection.php';
$id = $_GET['id'];
$old_data_query = "select * from user where id='$id'";
$old_data_exec= mysqli_query($conn,$old_data_query);
$fetch_old_data = mysqli_fetch_assoc($old_data_exec);
$old_name = $fetch_old_data['name'];
$old_address = $fetch_old_data['address'];

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){

    

    $name = $_POST['name'];
    $address = $_POST['address'];

    $update_query = "update user set name = '$name', address = '$address' where id='$id';";
    $update_exec = mysqli_query($conn,$update_query);
    
    if($update_exec){
    
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

        h1,p{
            text-align:center;
            
        }

        input{
            padding:5px;
            height:50px;
            width:200px;
        }

    </style>

</head>
<body>
    <h1>Update the details</h1>
   
    <hr>
<form action="#" method="post">

<p>Enter Name = <input type="text" name="name" value="<?php echo $old_name ?>"></p>

<p>Enter Address = <input type="text" name="address" value="<?php echo $old_address ?>"></p>
<p><input type="submit" value="Update Data" name="submit" value="submit"></p>

</form>

</p>
</body>
</html>