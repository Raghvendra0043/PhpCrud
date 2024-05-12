<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
<?php include_once 'header.php' ?>

<section class="content">
    <h1><b>Edit Records</b></h1>
  </section>


  <section class="AddRecord">
  <form action="<?php $_SERVER['PHP_SELF'];?>" class="F" method="post">
  <section >
    <label for="name">Id</label>
    <input type="text" class="name" name="sid">
    <Button class="btnshow" name="showbtn" value="show">Show</Button>
    </section>
</form>
<?php
if(isset($_POST['showbtn'])){
  $conn = mysqli_connect("localhost","root","","crud") or die("connection failed");

      $stu_id=$_POST['sid'];

      $sql = "SELECT * FROM student WHERE sid={$stu_id}";
    
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){

?>
<form action="updatedata.php" class="F" method="post">
    <section >
    <label for="name">Name</label>
    <input type="hidden" name="sid" value="<?php echo $row['sid'];?>">
    <input type="text" class="name" name="sname" value="<?php echo $row['sname'];?>">
    </section>

    <section >
    <label for="Address">Address</label>
    <input type="text" class="address" name="saddress" value="<?php echo $row['saddress'];?>">
    </section>

    <section class="class">
    <label for="Class">Class</label>
    <?php
      $sql1= "SELECT * FROM studentclass";
      $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result1)>0){
        echo '<select name="sclass" id="">

        <option value="" selected disabled>Select Class</option>';
        while($row1=mysqli_fetch_assoc($result1)){

        if($row['sclass'] == $row1['cid']){
          $select = "selected";
        }else{

          $select = "";
        }
    

    echo "<option {$select} value='{$row1['cid']}'>{$row1['cname']}</option>";
    }
    echo '</select>';
    }
    ?>
    </section>

    <section >
    <label for="Number">Number</label>
    <input type="text" name="sphone" class="number" value="<?php echo $row['sphone'];?>">
    </section>

    <section>
    
    <Button class="btnsave">Save</Button><br/>
    </section>

  
  </form>
  <?php
      }
    }
  }
  ?>
</section>
  
</body>
</html>