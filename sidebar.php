<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
session_start();  
if(!isset($_SESSION["email"]) && $_SESSION["email"] == ""){
header("Location: index.php");
}
?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark navbars" style="position:fixed;width: 280px;height:100vh;background: #343a40!important;" id="navbar">
    <div class="row">
      <div class="col-lg-9">
      <span class="fs-4" style="font-size: 15px!important;">Admin Dashboard</span>
      </div>
      <div class="col-lg-3" style="text-align:right;">
      <!-- <i class="fa-solid fa-times"></i> -->
      </div>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto" id="togglebar">
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link text-white <?=(($curPageName == "dashboard.php")? "active":"")?>" aria-current="page">
        <i class="fa-solid fa-home"></i>&nbsp;&nbsp;&nbsp;
          Home
        </a>
      </li>
      <li>
        <a href="clients.php" class="nav-link text-white <?=(($curPageName == "clients.php")? "active":"")?>">
        <i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;
          Clients List
        </a>
      </li>
      <li>
        <a href="logout.php"  class="nav-link text-white">
        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;
        Logout
        </a>
      </li>
    </ul>
  </div>