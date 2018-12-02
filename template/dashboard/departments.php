<!--  --------------- -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
<?php
	if(!empty($_GET['action'])){
			if($_GET['action']=="department-added"){
				echo "                       
				<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Şöbə uğurlu bir şəkildə əlavə
                          edildi.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
			}
			else if($_GET['action']=="department-deleted"){
				echo "                       
				<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Şöbə uğurlu bir şəkildə əlavə silindi.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
			}}
?>            	
              <h4 class="card-title"><b>Şöbələr</b></h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>Şöbənin sıra nömrəsi</th>                      	
                          <th>Şöbənin adı</th>
                          <th>Şöbənin açıqlaması</th>
                          <th> # Köməkçi alətlər</th>						                           
                      </tr>
                    </thead>
                    <tbody>
<?php 
			$select_departments ="SELECT department_id , department_title , department_desc FROM departments ORDER BY department_id DESC";  
			$result = mysqli_query($connect, $select_departments);  

			if(mysqli_num_rows($result) > 0)  {  
			while($row = mysqli_fetch_array($result)) {	
			$department_id=$row["department_id"];
			$department_name=$row["department_title"];
			$department_desc=$row["department_desc"];
			echo "
                      <tr>
                          <td>$department_id</td>
                          <td>$department_name</td>
                          <td>$department_desc</td>                          
                          <td>
                            <a href=\"/dashboard/edit-department&department_id=$department_id\" class=\"btn btn-lg btn-primary\">Şöbəni idarə et</a>
                          </td>
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