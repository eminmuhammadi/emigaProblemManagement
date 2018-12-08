<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!--  --------------- -->

<?php

    if($_SESSION['user_permission']=="GA"){
      require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/server-GA.php";
    }


?>

            <div class="box col-12 grid-margin mt-2">
          <div class="row">

<?php 
      $select_GA_users ="SELECT  user_name , user_lastname , user_email , user_permission FROM users WHERE user_permission='GA' ";  
      $result = mysqli_query($connect, $select_GA_users);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $user_name        = $row["user_name"];
      $user_lastname    = $row["user_lastname"];
      $user_email       = $row["user_email"];
      $user_permission  = $row["user_permission"];
      echo "
            <div class=\"col-md-4 grid-margin stretch-card\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"d-flex flex-row\">
                    <div class=\"ml-3\">
                      <h6>$user_name $user_lastname</h6>
                    <a href=\"mailto:$user_email\">
                      <p class=\"text-muted\">$user_email</p>
                    </a>                     
                      <p class=\"mt-2 text-success font-weight-bold\">Böyük Administrator</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
      ";}}     
?>





        
        </div>                     
            </div>


<!-- Start Template -->
          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->    
<!--  --------------- -->