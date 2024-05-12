<?php

  echo $stu_name=$_POST['sname'];
  echo $stu_address=$_POST['saddress'];
  echo $stu_class=$_POST['class'];
  echo $stu_number=$_POST['sphone'];



  $conn = mysqli_connect("localhost","root","","crud") or die("connection failed");

  $sql = "INSERT INTO student(sname,saddress,sclass,sphone) VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_number}')";
    
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  header("location: http://localhost/phpcrud/home.php");

  mysqli_close($conn);

?>