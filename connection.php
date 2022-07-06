<?php 

$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server,$username,$password);
// $conn = mysqli_connect("localhost","root","");

if($conn){
   
    $database_query = "Create database if not exists ISHA_DB ";
    $db_create = mysqli_query($conn, $database_query);
    $db_name = "ISHA_DB";
    if($db_create){
        //echo "the data base is created";
        $conn = mysqli_connect($server,$username,$password,$db_name);

        $table_query= "Create table if not exists user(  
            id int(50) PRIMARY KEY NOT NULL AUTO_INCREMENT,
            name nvarchar(100) NOT NULL,
            address nvarchar(100) NOT NULL,
            reg_date timestamp Default CURRENT_TIMESTAMP
         )";
        $table_create = mysqli_query($conn,$table_query);

        if($table_create){
            //echo "table is created";

        }else{

            echo "some error occured";
        }


    }else{

        echo "some error occured";
    }

}else{
    die("Db connection failed" . mysqli_connect_error());
}

?>