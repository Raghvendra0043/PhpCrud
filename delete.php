<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
<?php include_once 'header.php';

  if(isset($_POST['deletebtn'])){
    include 'config.php';
    $stu_id = $_POST['sid'];

    $sql = "DELETE FROM student WHERE sid = {$stu_id} ";

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  header("location: http://localhost/phpcrud/home.php");

  mysqli_close($conn);
  }

?>
<section class="content">
    <h1><b>Delete Records</b></h1>
  </section>

 
  <section class="AddRecord">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="F" method="post">
  <section >
    <label for="name">Id</label>
    <input type="text" class="name" name="sid">
    <Button class="btnshow" name="deletebtn">Delete</Button><br>
    </section>


  
  </form>
</section>

</body>
</html>