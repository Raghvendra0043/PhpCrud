<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Php CRUD Application</title>

  
</head>
<body>
  <?php include_once 'header.php' ?>
  <section class="content">
    <h1><b>All Records</b></h1>
  </section>



  <section class="records">

  <?php 
  
  $conn = mysqli_connect("localhost","root","","crud") or die("connection failed");

  $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass= studentclass.cid";

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  if(mysqli_num_rows($result) > 0){

?>

    <table border="2px solid black">
      <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>CLASS</th>
            <th>PHONE</th>
            <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
      <?php

        while ($row = mysqli_fetch_assoc($result)) {
    // Do something with the row data here


?>
        <tr>
          <td><?php echo $row['sid'];?></td>
          <td><?php echo $row['sname'];?></td>
          <td><?php echo $row['saddress'];?></td>
          <td><?php echo $row['cname'];?></td>
          <td><?php echo $row['sphone'];?></td>
          <td>
            <BUTTON class="edit b"><a href="edit.php?id=<?php echo $row['sid'];?>">EDIT</a></BUTTON>
            <BUTTON class="delete b"><a href="delete-inline.php?id=<?php echo $row['sid'];?>">DELETE</a></BUTTON>
          </td>
        </tr>
        <?php } ?>


        
      </tbody>
    </table>
    <?php }else echo "No record found";
    
    mysqli_close($conn);
    
    ?>
  </section>
  
</body>
</html>