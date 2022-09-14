<?php
include("config.php");
try  
 {  
      if(isset($_POST['login_btn']))  
      {  
        $email = $_POST['email'];
        $password = md5($_POST['password']);
           if(empty($email) || empty($password))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM admin WHERE email = :email AND password = :password";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $email,
                          'password'     =>     $password
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    session_start();
                     $_SESSION["email"] = $_POST["email"];
                     header("location:dashboard.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <script src="https://kit.fontawesome.com/d37601e2b7.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="login_form">
        <form method="POST" action="<?=$_SERVER['PHP_SELF']?>" class="form_submit">
        <h3>Login</h3>
        <hr>
            <label>Email</label><input required type="email" name="email" class="form-control">
            <label>Password</label><input required type="password" name="password" class="form-control">
            <br><input type="submit" class="btn btn-secondary" name="login_btn" value="Login">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
  </body>
</html>