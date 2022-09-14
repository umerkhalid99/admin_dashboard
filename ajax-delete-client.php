<?php
include("config.php");
try {
    $delete_id = $_POST['delete_id'];
    $sql = "Delete FROM clients WHERE id='$delete_id'";

    $conn->exec($sql);
    echo "Record Deleted successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
?>