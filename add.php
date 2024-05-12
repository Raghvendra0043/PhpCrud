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
    <h1><b>Add New Records</b></h1>
  </section>

  <section class="AddRecord">
  <form action="savedata.php" method="post" class="F">
    <section >
    <label for="name">Name</label>
    <input type="text" class="name" name="sname">
    </section>

    <section >
    <label for="Address">Address</label>
    <input type="text" class="address" name="saddress">
    </section>

    <section class="class">
    <label for="Class">Class</label>
    <select name="class" id="">

    <option value="" selected disabled>Select Class</option>

      <?php
      
      $conn = mysqli_connect("localhost","root","","crud") or die("connection failed");

      $sql = "SELECT * FROM studentclass";
    
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      while($row= mysqli_fetch_assoc($result)){
      
      ?>

    <option value="<?php echo $row['cid']?>"><?php echo $row['cname']?></option>
    <?php }?>
    
    </select>
    
    </section>

    <section >
    <label for="Number">Number</label>
    <input type="text" name="sphone" class="number">
    </section>

    <section>
    
    <Button class="btnsave">Save</Button><br/>
    </section>

  
  </form>
  </section>
</body>
</html>