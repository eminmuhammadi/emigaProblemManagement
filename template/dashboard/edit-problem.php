<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!--  --------------- -->
<?php
  if(!empty($_GET['problem_id'])){
    /*
    *   Get Problem Information
    */
    $problem_id = $_GET['problem_id'];
    $get_problem_inf ="SELECT * FROM posts WHERE problem_id='$problem_id' ";  
    $result_department_inf = mysqli_query($connect, $get_problem_inf);  

    if(mysqli_num_rows($result_department_inf) > 0){  
      while($row = mysqli_fetch_array($result_department_inf)){ 

        $department_detail   = $row["department_detail"];
        $user_detail         = $row["user_detail"];
        $problem_title       = $row["problem_title"];
        $problem_description = $row["problem_description"];
        $problem_status      = $row["problem_status"];
        $problem_status_description = $row["problem_status_description"];
        $range_date_start    = $row["range_date_start"];
        $range_date_end      = $row["range_date_end"];
        $reg_date            = $row["reg_date"];


        }
    }

    /*
    *   Problem not found
    */
      else {die("Heç bir problem tapılmadı.");}


    /*
    *     Edit  U
    */
    if ($_SESSION['user_permission']=="U") {

    $user_fullname=$_SESSION['user_name']." ".$_SESSION['user_lastname'];
    if($user_detail!=$user_fullname){die("Bunu etməyə heç bir səlahiyyətin yoxdur");}

        if(isset($_POST['edit_problem'])){

        $problem_title=mysqli_real_escape_string($connect, $_POST["problem_title"]);
        $department_detail=mysqli_real_escape_string($connect, $_POST["department_detail"]);
        $problem_description=mysqli_real_escape_string($connect, $_POST["problem_description"]);
        $range_date_start=mysqli_real_escape_string($connect, $_POST["range_date_start"]);
        $range_date_end=mysqli_real_escape_string($connect, $_POST["range_date_end"]);
        

        $update_problem =" UPDATE posts SET problem_title='$problem_title' , department_detail='$department_detail' , problem_description='$problem_description' , range_date_start='$range_date_start', range_date_end='$range_date_end' WHERE problem_id='$problem_id' "; 

          $result_problem_inf = mysqli_query($connect, $update_problem);
          echo"<script>window.location.href = \"/dashboard/edit-problem&problem_id=$problem_id\";</script>";       


        }

  }
    /*
    *     Edit A and GA
    */
    else if(($_SESSION['user_permission']=="A")||($_SESSION['user_permission']=="GA")){

      if(isset($_POST['edit_problem'])){ 
          
        $problem_title=mysqli_real_escape_string($connect, $_POST["problem_title"]);
        $department_detail=mysqli_real_escape_string($connect, $_POST["department_detail"]);
        $problem_description=mysqli_real_escape_string($connect, $_POST["problem_description"]);
        $range_date_start=mysqli_real_escape_string($connect, $_POST["range_date_start"]);
        $range_date_end=mysqli_real_escape_string($connect, $_POST["range_date_end"]);
        $problem_status=mysqli_real_escape_string($connect, $_POST["problem_status"]);
        $problem_status_description=mysqli_real_escape_string($connect, $_POST["problem_status_description"]);
        $reg_date=mysqli_real_escape_string($connect, $_POST["reg_date"]);

        $update_problem =" UPDATE posts SET problem_title='$problem_title' , department_detail='$department_detail' , problem_description='$problem_description' , range_date_start='$range_date_start', range_date_end='$range_date_end', problem_status='$problem_status', problem_status_description='$problem_status_description', reg_date='$reg_date' WHERE problem_id='$problem_id' "; 

          $result_problem_inf = mysqli_query($connect, $update_problem);
          echo"<script>window.location.href = \"/dashboard/edit-problem&problem_id=$problem_id\";</script>";    
      }

    }
    /*
    *     Delete GA
    */
    if($_SESSION['user_permission']=="GA"){

          if(isset($_POST['delete_problem'])){ 
                $delete_problem ="DELETE FROM posts WHERE problem_id='$problem_id' ";  
                $result_delete_problem = mysqli_query($connect, $delete_problem);
                echo"<script>window.location.href = \"/dashboard/all-problems&action=problem-deleted\";</script>";     
          }


    }}

    /*
    *    Problem id not selected
    */
    else{die("Heç bir problem seçilmədi.");}


    /*
    *    User permission for processing
    */
    if($_SESSION['user_permission']=="U"){
    require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/U/edit-problem.php";
    }
    else if($_SESSION['user_permission']=="A"){
    require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/A/edit-problem.php";
    }
    else if($_SESSION['user_permission']=="GA"){
    require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/GA/edit-problem.php";
    }
?>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- Content -->
                  <ul class="bullet-line-list">
                      <h4 class="mb-4">İstifadə qaydaları</h4>
                    <li>
                      <h6>Problemin adı</h6>
                      <p class="mb-2">Problemi ifadə edən dəqiq başlıq yazılmalıdır</p>
                    </li>
                    <li>
                      <h6>Şöbə</h6>
                      <p class="mb-2">Problemin həlli üçün şöbənin dəqiq seçilməsi vacibdir</p>
                    </li>
                     <li>
                      <h6>Problemin açıqlaması</h6>
                      <p class="mb-2">Problemi qısa şəkildə izah edin</p>
                    </li>
                      <li>
                      <h6>Həll müddəti</h6>
                      <p class="mb-2">Problemin aktuallığı vacib olduğu üçün problemin həll edilmə aralığının da seçilməsi vacibdir</p>
                    </li>                  
                  </ul>

                </div>
              </div>
            </div>
<!-- Start Template -->
          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->    
<!--  --------------- -->
