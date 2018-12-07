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
                          <strong><i class=\"icon-note\"></i></strong> Problem uğurlu bir şəkildə əlavə edildi.
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
                  <h4 class=""><b>Mənim <?php
                    if ($_SESSION['user_permission']=="U") {
                      echo "problemlərim";
                    }
                    else{echo "işlərim <h1 class=\"badge badge-primary\"><b> Şöbə : ".$_SESSION["user_department_detail"]."</b></h1>";}

                  ?></b></h4>
              </div>
              <div class="col-12 col-lg-4">
              <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                       <option selected disabled hidden value="">Filtrlə</option>
                       <option value="/dashboard/my-tasks">Hamısı</option>
                       <option value="/dashboard/my-tasks&order=P">Gözləmədə olan</option>
                       <option value="/dashboard/my-tasks&order=C">Ləğv edilən</option>
                       <option value="/dashboard/my-tasks&order=D">Həll edilən</option>
                       <option value="/dashboard/my-tasks&order=V">Görülən</option>
              </select>
                </div>    
              </div>  
              <div class="row">
                <div class="col-12 table-responsive">
                <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>#</th>                        
                          <th>Adı</th>
                          <th>İstifadəçi</th>
                          <th>Şöbə</th>                                      
                          <th>Status</th>  
                          <th>Qeydiyyat tarixi</th>   
                      </tr>
                    </thead>
                    <tbody>
<?php 

    $user_d=$_SESSION['user_name']." ".$_SESSION['user_lastname'];
    $user_department=$_SESSION['user_department_detail'];

if (!empty($_GET['order'])) { 

      /*
       *   MY WORKS (ADMIN SIDE)
       */

      if($_SESSION['user_permission']=="GA" || $_SESSION['user_permission']=="A" ){

          if($_GET['order']=="P"){

          /*
          *  SQL
          */ 

          $select_posts ="SELECT problem_id , department_detail , user_detail , problem_title , problem_status , reg_date FROM posts WHERE problem_status='P' && department_detail='$user_department' ORDER BY problem_id DESC";  
           $result = mysqli_query($connect, $select_posts);}


          else   if($_GET['order']=="C"){

          /*
          *  SQL
          */ 

          $select_posts ="SELECT problem_id ,   department_detail , user_detail , problem_title , problem_status , reg_date  FROM posts WHERE problem_status='C' && department_detail='$user_department' ORDER BY problem_id DESC";  
          $result = mysqli_query($connect, $select_posts);}

          else    if($_GET['order']=="D"){

          /*
          *  SQL
          */ 

          $select_posts ="SELECT problem_id ,   department_detail , user_detail , problem_title , problem_status , reg_date  FROM posts WHERE problem_status='D' && department_detail='$user_department' ORDER BY problem_id DESC";  
          $result = mysqli_query($connect, $select_posts);}


          else  if($_GET['order']=="V"){

          /*
          *  SQL
          */  
         $select_posts ="SELECT problem_id ,  department_detail , user_detail , problem_title , problem_status , reg_date FROM posts WHERE problem_status='V' && department_detail='$user_department' ORDER BY problem_id DESC";  
          $result = mysqli_query($connect, $select_posts);  }

          /* ~ Permission denied ~*/
         else{
                die("Bunu etməyə səlahiyyətiniz yoxdur.");
             }


         }
}


else{


      $select_posts ="SELECT problem_id ,   department_detail , user_detail , problem_title , problem_status , reg_date FROM posts WHERE department_detail='$user_department' ORDER BY problem_id DESC";
      $result = mysqli_query($connect, $select_posts);      

} 


      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {

      /*
      *   Variables
      */        
          $problem_id           = $row["problem_id"];
          $department_detail    = $row["department_detail"];
          $user_detail          = $row["user_detail"];
          $problem_title        = $row["problem_title"];
          $problem_status       = $row["problem_status"];
          $reg_date             = emigaDateFormatter($row["reg_date"]);

      /*
      *       Problem Status -> Cancel , Viewed , Done , Pending 
      *                           C         V      D        P
      */
            if($problem_status=="C"){$problem_css="danger";$problem_status="Ləğv edildi";}
            else if($problem_status=="V"){$problem_css="warning";$problem_status="Görüldü";}
            else if($problem_status=="D"){$problem_css="success";$problem_status="Həll edildi";}
            else{$problem_css="info";$problem_status="Gözləmədə";}

      echo "
      <tr>
          <td>$problem_id</td>
          <td><a href=\"/dashboard/edit-problem&problem_id=$problem_id\">$problem_title</a></td>
          <td>$user_detail</td>
          <td>$department_detail</td>
          <td><label class=\"badge badge-$problem_css\">$problem_status</label></td> 
          <td>$reg_date</td>                                                       
      </tr>
      ";}


} 
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->