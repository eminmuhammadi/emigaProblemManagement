<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<?php


 /*
  *   Show Statics for user permission
  */

   if($_SESSION['user_permission']=="GA"){
    require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/index-GA.php"; 
   }

   else if($_SESSION['user_permission']=="A"){
    require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/index-A.php"; 
   }   

   else if($_SESSION['user_permission']=="U"){
    require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/index-U.php"; 
   }
?>
      </div>
    </div>
  </div>
</div>