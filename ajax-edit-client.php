<?php
include("config.php");
try {
    $edit_id = $_POST['edit_id'];
    $edit_first_name = $_POST['edit_first_name'];
    $edit_last_name = $_POST['edit_last_name'];
    $edit_phone_number = $_POST['edit_phone_number'];
    $sql = "UPDATE clients SET first_name='$edit_first_name', last_name='$edit_last_name', phone_number='$edit_phone_number' WHERE id='$edit_id'";

    $conn->exec($sql);
    // echo "Record Updated successfully";
    ?>
    <tr id="table_row_<?=$edit_id?>" class="table_row">
      <td><?=$edit_id?></td>
      <td><?=$edit_first_name?></td>
      <td><?=$edit_last_name?></td>
      <td><?=$edit_phone_number?></td>
      <td><button style="background:none;border:none;color:#0d6efd;" data-id="<?=$edit_id?>"
       data-fname="<?=$edit_first_name?>" data-lname="<?=$edit_last_name?>"
        data-phone="<?=$edit_phone_number?>" data type="button"
        data-toggle="modal" data-target="#editexampleModal"
        class="edit_buttons" ><i class="fa-solid fa-edit" data-toggle="tooltip"
        title="Edit Client"></i></button>
        <button type="button" style="background:none;border:none;color:#0d6efd;" class="delete_client" data-id="<?=$edit_id?>">
          <i class="fa-solid fa-trash" data-toggle="tooltip"
        title="Delete Client"></i></button>
      </td>
  </tr>
    <?php
  } catch(PDOException $e) {
    // echo $sql . "<br>" . $e->getMessage();
  }
?>