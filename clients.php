<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clients List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <script src="https://kit.fontawesome.com/d37601e2b7.js" crossorigin="anonymous"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <div class="row" style="width:100%;">
        <div class="col-lg-3">
            <?php include("sidebar.php")?>
        </div>
        <div class="col-lg-9">
            <div class="row mt-5 mb-3">
                <div class="col-lg-6"><h3>All Clients List</h3></div>
                <div class="col-lg-6" style="text-align: right;"><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" >+</button></div>
            </div>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Client ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                       try {
   
                        $stmt = $conn->prepare("SELECT id, first_name, last_name, phone_number FROM clients ORDER BY id DESC");
                        $stmt->execute(); 
                        $nRows = $conn->query('select count(*) from clients')->fetchColumn();
                        if($nRows > 0){
                        while($v = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $id = $v['id'];
                            $first_name = $v['first_name'];
                            $last_name = $v['last_name'];
                            $phone_number = $v['phone_number'];
                            ?>
        <tr id="table_row_<?=$id?>" class="table_row">
            <td><?=$id?></td>
            <td><?=$first_name?></td>
            <td><?=$last_name?></td>
            <td><?=$phone_number?></td>
            <td><button style="background:none;border:none;color:#0d6efd;" data-id="<?=$id?>" data-fname="<?=$first_name?>" data-lname="<?=$last_name?>"
             data-phone="<?=$phone_number?>" data type="button"
             data-toggle="modal" data-target="#editexampleModal"
             class="edit_buttons" ><i class="fa-solid fa-edit" data-toggle="tooltip"
              title="Edit Client"></i></button>
              <button type="button" style="background:none;border:none;color:#0d6efd;" class="delete_client" data-id="<?=$id?>">
                <i class="fa-solid fa-trash" data-toggle="tooltip"
              title="Delete Client"></i></button>
            </td>
        </tr>
                            <?php
                        }
                    }else{
                        echo "<tr><td colspan='5' class='text-center'>No Data Found</td></tr>";
                    }
                      } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                      }
                      $conn = null;
                ?>
            </tbody>
        </table>
        </div>
    </div>

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
        <button style="background:none;border:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12"><label>First Name</label><input required type="text" name="first_name" id="add_first_name" class="form-control"></div>
            <div class="col-12"><label>Last Name</label><input required type="text" name="last_name" id="add_last_name" class="form-control"></div>
            <div class="col-12"><label>Phone Number</label><input required type="number" name="phone_number"  id="add_phone_number" class="form-control"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add_clients">Add Client</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
        <button style="background:none;border:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12"><label>First Name</label><input required type="text" name="first_name" id="edit_first_name" class="form-control"></div>
            <div class="col-12"><label>Last Name</label><input required type="text" name="last_name" id="edit_last_name" class="form-control"></div>
            <div class="col-12"><label>Phone Number</label><input required type="number" name="phone_number"  id="edit_phone_number" class="form-control"></div>
            <input type="hidden" id="edit_id" value="" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit_clients">Edit Client</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
  </body>
</html>