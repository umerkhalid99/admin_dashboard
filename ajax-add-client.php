<?php
include("config.php");
try {
    $add_first_name = $_POST['add_first_name'];
    $add_last_name = $_POST['add_last_name'];
    $add_phone_number = $_POST['add_phone_number'];
    $sql = "INSERT INTO clients (first_name, last_name, phone_number) VALUES ('$add_first_name', '$add_last_name', '$add_phone_number')";

    $conn->exec($sql);
    $id = $conn->lastInsertId();
    // echo "New record created successfully";
    ?>
    <tr id="table_row_<?=$id?>" class="table_row">
      <td><?=$id?></td>
      <td><?=$add_first_name?></td>
      <td><?=$add_last_name?></td>
      <td><?=$add_phone_number?></td>
      <td><button style="background:none;border:none;color:#0d6efd;" data-id="<?=$id?>"
       data-fname="<?=$add_first_name?>" data-lname="<?=$add_last_name?>"
        data-phone="<?=$add_phone_number?>" data type="button"
        data-toggle="modal" data-target="#editexampleModal"
        class="edit_buttons" ><i class="fa-solid fa-edit" data-toggle="tooltip"
        title="Edit Client"></i></button>
        <button type="button" style="background:none;border:none;color:#0d6efd;" class="delete_client" data-id="<?=$id?>">
          <i class="fa-solid fa-trash" data-toggle="tooltip"
        title="Delete Client"></i></button>
      </td>
  </tr>
    <?php
  } catch(PDOException $e) {
    // echo $sql . "<br>" . $e->getMessage();
  }
?>