<!-- Start Template -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
<!--  --------------- -->              
<?php
	if(!empty($_GET['action'])){
			if($_GET['action']=="problem-added"){
				echo "                       
				<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Problem uğurlu bir şəkildə əlavə
                          edildi.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
			}
			else if($_GET['action']=="problem-deleted"){
				echo "                       
				<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Problem uğurlu bir şəkildə silindi.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
			}}
?>         
            <div class="row mb-5"> 
              <div class="col-12 col-lg-8">
                  <h4 class=""><b>Problemlər</b></h4>
              </div>
              <div class="col-12 col-lg-4">
              <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                       <option selected disabled hidden value="">Filtrlə</option>
                       <option value="/dashboard/all-problems">Hamısı</option>
                       <option value="/dashboard/all-problems&order=P">Gözləmədə olan</option>
                       <option value="/dashboard/all-problems&order=C">Ləğv edilən</option>
                       <option value="/dashboard/all-problems&order=D">Həll edilən</option>
                      <option value="/dashboard/all-problems&order=V">Görülən</option>
              </select>
                </div>   	
              </div>  
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>#</th>                      	
                          <th>P. A.</th>
                          <th>İstifadəçi</th>
                          <th>Şöbə</th>                                                   
                          <th>P. S.</th>  
                          <th>P. S. AÇ.</th>   
                          <th>P. Akt.</th>   
                          <th>Y. T.</th>
                      </tr>
                    </thead>
                    <tbody>
<?php 

    if (!empty($_GET['order'])) {
      
          if($_GET['order']=="P"){

      $select_posts ="SELECT * FROM posts WHERE problem_status='P' ORDER BY problem_id DESC";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $problem_id           = $row["problem_id"];
      $department_detail    = $row["department_detail"];
      $user_detail          = $row["user_detail"];
      $problem_title        = $row["problem_title"];
      $problem_status       = $row["problem_status"];
      $problem_status_description  = substr($row["problem_status_description"], 0, 10)."...";
      $range_date_start     = emigaDateFormatter($row["range_date_start"]);
      $range_date_end       = emigaDateFormatter($row["range_date_end"]);
      $reg_date             = emigaDateFormatter($row["reg_date"]);
      /*
      *       Problem Status -> Cancel , Viewed , Done , Pending 
      *                           C         V      D        P
      */
                 if($problem_status=="C"){$problem_css="danger";$problem_status="Ləğv edildi";}
            else if($problem_status=="V"){$problem_css="warning";$problem_status="Görüldü";}
            else if($problem_status=="D"){$problem_css="success";$problem_status="Həll edildi";}
               else{$problem_css="info";$problem_status="Gözləmədə";}/*P*/
      echo "
      <tr>
          <td>$problem_id</td>
          <td><a href=\"/dashboard/edit-problem&problem_id=$problem_id\">$problem_title</a></td>
          <td>$user_detail</td>
          <td>$department_detail</td>
          <td><label class=\"badge badge-$problem_css\">$problem_status</label></td> 
          <td>$problem_status_description</td>
          <td>$range_date_start ~ $range_date_end</td>
          <td>$reg_date</td>                                                       
      </tr>
      ";}}

          }


       else   if($_GET['order']=="C"){

      $select_posts ="SELECT * FROM posts WHERE problem_status='C' ORDER BY problem_id DESC";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $problem_id           = $row["problem_id"];
      $department_detail    = $row["department_detail"];
      $user_detail          = $row["user_detail"];
      $problem_title        = $row["problem_title"];
      $problem_status       = $row["problem_status"];
      $problem_status_description  = substr($row["problem_status_description"], 0, 10)."...";
      $range_date_start     = emigaDateFormatter($row["range_date_start"]);
      $range_date_end       = emigaDateFormatter($row["range_date_end"]);
      $reg_date             = emigaDateFormatter($row["reg_date"]);
      /*
      *       Problem Status -> Cancel , Viewed , Done , Pending 
      *                           C         V      D        P
      */
                 if($problem_status=="C"){$problem_css="danger";$problem_status="Ləğv edildi";}
            else if($problem_status=="V"){$problem_css="warning";$problem_status="Görüldü";}
            else if($problem_status=="D"){$problem_css="success";$problem_status="Həll edildi";}
               else{$problem_css="info";$problem_status="Gözləmədə";}/*P*/
      echo "
      <tr>
          <td>$problem_id</td>
          <td><a href=\"/dashboard/edit-problem&problem_id=$problem_id\">$problem_title</a></td>
          <td>$user_detail</td>
          <td>$department_detail</td>
          <td><label class=\"badge badge-$problem_css\">$problem_status</label></td> 
          <td>$problem_status_description</td>
          <td>$range_date_start ~ $range_date_end</td>
          <td>$reg_date</td>                                                       
      </tr>
      ";}}

          }

       else    if($_GET['order']=="D"){

      $select_posts ="SELECT * FROM posts WHERE problem_status='D' ORDER BY problem_id DESC";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $problem_id           = $row["problem_id"];
      $department_detail    = $row["department_detail"];
      $user_detail          = $row["user_detail"];
      $problem_title        = $row["problem_title"];
      $problem_status       = $row["problem_status"];
      $problem_status_description  = substr($row["problem_status_description"], 0, 10)."...";
      $range_date_start     = emigaDateFormatter($row["range_date_start"]);
      $range_date_end       = emigaDateFormatter($row["range_date_end"]);
      $reg_date             = emigaDateFormatter($row["reg_date"]);
      /*
      *       Problem Status -> Cancel , Viewed , Done , Pending 
      *                           C         V      D        P
      */
                 if($problem_status=="C"){$problem_css="danger";$problem_status="Ləğv edildi";}
            else if($problem_status=="V"){$problem_css="warning";$problem_status="Görüldü";}
            else if($problem_status=="D"){$problem_css="success";$problem_status="Həll edildi";}
               else{$problem_css="info";$problem_status="Gözləmədə";}/*P*/
      echo "
      <tr>
          <td>$problem_id</td>
          <td><a href=\"/dashboard/edit-problem&problem_id=$problem_id\">$problem_title</a></td>
          <td>$user_detail</td>
          <td>$department_detail</td>
          <td><label class=\"badge badge-$problem_css\">$problem_status</label></td> 
          <td>$problem_status_description</td>
          <td>$range_date_start ~ $range_date_end</td>
          <td>$reg_date</td>                                                       
      </tr>
      ";}}

          }


       else    if($_GET['order']=="V"){

      $select_posts ="SELECT * FROM posts WHERE problem_status='D' ORDER BY problem_id DESC";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $problem_id           = $row["problem_id"];
      $department_detail    = $row["department_detail"];
      $user_detail          = $row["user_detail"];
      $problem_title        = $row["problem_title"];
      $problem_status       = $row["problem_status"];
      $problem_status_description  = substr($row["problem_status_description"], 0, 10)."...";
      $range_date_start     = emigaDateFormatter($row["range_date_start"]);
      $range_date_end       = emigaDateFormatter($row["range_date_end"]);
      $reg_date             = emigaDateFormatter($row["reg_date"]);
      /*
      *       Problem Status -> Cancel , Viewed , Done , Pending 
      *                           C         V      D        P
      */
                 if($problem_status=="C"){$problem_css="danger";$problem_status="Ləğv edildi";}
            else if($problem_status=="V"){$problem_css="warning";$problem_status="Görüldü";}
            else if($problem_status=="D"){$problem_css="success";$problem_status="Həll edildi";}
               else{$problem_css="info";$problem_status="Gözləmədə";}/*P*/
      echo "
      <tr>
          <td>$problem_id</td>
          <td><a href=\"/dashboard/edit-problem&problem_id=$problem_id\">$problem_title</a></td>
          <td>$user_detail</td>
          <td>$department_detail</td>
          <td><label class=\"badge badge-$problem_css\">$problem_status</label></td> 
          <td>$problem_status_description</td>
          <td>$range_date_start ~ $range_date_end</td>
          <td>$reg_date</td>                                                       
      </tr>
      ";}}

          }
      else{die("Bunu etməyə səlahiyyətiniz yoxdur.");}
    }
    else{
			$select_posts ="SELECT * FROM posts ORDER BY problem_id DESC";  
			$result = mysqli_query($connect, $select_posts);  
			if(mysqli_num_rows($result) > 0)  {  
			while($row = mysqli_fetch_array($result)) {
			$problem_id           = $row["problem_id"];
			$department_detail    = $row["department_detail"];
			$user_detail          = $row["user_detail"];
      $problem_title        = $row["problem_title"];
      $problem_status       = $row["problem_status"];
      $problem_status_description  = substr($row["problem_status_description"], 0, 10)."...";
      $range_date_start     = emigaDateFormatter($row["range_date_start"]);
      $range_date_end       = emigaDateFormatter($row["range_date_end"]);
      $reg_date             = emigaDateFormatter($row["reg_date"]);
      /*
      *       Problem Status -> Cancel , Viewed , Done , Pending 
      *                           C         V      D        P
      */
                 if($problem_status=="C"){$problem_css="danger";$problem_status="Ləğv edildi";}
            else if($problem_status=="V"){$problem_css="warning";$problem_status="Görüldü";}
            else if($problem_status=="D"){$problem_css="success";$problem_status="Həll edildi";}
               else{$problem_css="info";$problem_status="Gözləmədə";}/*P*/
			echo "
      <tr>
          <td>$problem_id</td>
          <td><a href=\"/dashboard/edit-problem&problem_id=$problem_id\">$problem_title</a></td>
          <td>$user_detail</td>
          <td>$department_detail</td>
          <td><label class=\"badge badge-$problem_css\">$problem_status</label></td> 
          <td>$problem_status_description</td>
          <td>$range_date_start ~ $range_date_end</td>
          <td>$reg_date</td>                                                       
      </tr>
			";}}
    }

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