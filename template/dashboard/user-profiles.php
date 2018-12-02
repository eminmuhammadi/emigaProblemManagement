<!-- Start Template -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
<!--  --------------- -->              
<?php
	if(!empty($_GET['action'])){
			if($_GET['action']=="user-deleted"){
				echo "                       
				<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> İstifadəçi silindi.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
			}}
?>            	
              <h4 class="card-title"><b>Bütün Problemlər</b></h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>#</th>                      	
                          <th>İstifadəçi</th>
                          <th>Status</th>        
                          <th>Şöbə</th>
                          <th>Daxil olma tarixi</th>                            
                      </tr>
                    </thead>
                    <tbody>
<?php 
			$select_users ="SELECT user_id ,user_name , user_department_detail , user_lastname , user_permission , last_logged FROM users ORDER BY user_id DESC";  
			$result = mysqli_query($connect, $select_users);  
			if(mysqli_num_rows($result) > 0)  {  
			while($row = mysqli_fetch_array($result)) {
			$user_name          = $row["user_name"];
      $user_id            = $row["user_id"];      
			$user_lastname      = $row["user_lastname"];
      $user_department_detail =  $row["user_department_detail"];
			$user_permission    = $row["user_permission"];
      $last_logged        = $row["last_logged"];
                 if($user_permission=="U"){$status="İstifadəçi";}
            else if($user_permission=="A"){$status="Administratort";}
            else if($user_permission=="GA"){$status="Böyük Administrator";}
			echo "
      <tr>
          <td>$user_id</td>
          <td><a href=\"/dashboard/edit-user-profile&user_id=$user_id\">$user_name $user_lastname</a></td>
          <td>$status</td> 
          <td>$user_department_detail</td> 
          <td>$last_logged</td>                                                       
      </tr>
			";}}
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- Start Template -->
          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->     
<!--  --------------- -->