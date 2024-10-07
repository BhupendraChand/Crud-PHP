<?php
include "database_connect.php";
$Id = $_GET["id"];

if (isset($_POST["submit"])) {
  $Book_Name = $_POST['Book_Name'];
    $Author = $_POST['Author'];
    $Publisher = $_POST['Publisher'];
    $Price = $_POST['Price'];

  $sql = "UPDATE `table_book` SET `Book_Name`='$Book_Name',`Author`='$Author',`Publisher`='$Publisher',`Price`='$Price' WHERE Id = $Id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: Crud.php?msg=Data Updated Successfully.");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  
</head>

<body>
  


  <div class="container">
    <div class="text-center mb-4">
      
      <p class="text-muted"> Updates Any Book Details</p>
    </div>
   
    <?php
   $sql = "SELECT * FROM `table_book` WHERE Id = $Id LIMIT 1";
   $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Book Name:</label>
            <input type="text" class="form-control" name="Book_Name" value="<?php echo $row['Book_Name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Author</label>
            <input type="text" class="form-control" name="Author" value="<?php echo $row['Author'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Publisher</label>
          <input type="text" class="form-control" name="Publisher" value="<?php echo $row['Publisher'] ?>">

          
        </div>

        <div class="form-group mb-3">
          <label>Price</label>
          <input type="number" class="form-control" name="Price" value="<?php echo $row['Price'] ?>">
         
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="curd.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>