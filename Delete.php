<?php
include "database_connect.php";
$Id = $_GET["id"];
$sql = "DELETE FROM `table_book` WHERE Id = $Id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: Crud.php?msg=Data Deleted Successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}