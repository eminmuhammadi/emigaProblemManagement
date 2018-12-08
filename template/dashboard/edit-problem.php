<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<?php
if(!empty($_GET['problem_id'])){

    $problem_id=$_GET['problem_id'];
     /*
      *   GET INFORMATION
      */ 

      $select_posts ="SELECT * FROM posts WHERE problem_id='$problem_id' ";  
      $result = mysqli_query($connect, $select_posts);  

     /*
      *   Variables
      */ 


      if(mysqli_num_rows($result) > 0)  {  
        while($row = mysqli_fetch_array($result)) { 

            $problem_mobile=$row['problem_mobile'];
            $department_detail=$row['department_detail'];
            $user_detail=$row['user_detail'];
            $problem_title=$row['problem_title'];
            $problem_description=$row['problem_description'];
            $problem_status=$row['problem_status'];
            $problem_status_description=$row['problem_status_description'];
            $problem_admin=$row['problem_admin'];
            $reg_date=$row['reg_date'];
            $user_id=$row['user_id'];
  

        }
      }

    else {die("Heç bir problem tapılmadı .");}
/*
*   Verifying User ID to access this property
*/

if (($user_id!=$_SESSION['user_id']) && ($_SESSION['user_permission']=="U")) {
      die("Bu problem sizin tərəfinizdən yaradılmayıb.");
    } 

/*
*   Verifying A department detail to access this property
*/
if (($department_detail!=$_SESSION['user_department_detail']) && ($_SESSION['user_permission']=="A")) {
      die("Bu problem sizin şöbəyə aid deyil.");
    } 


    if ($_SESSION['user_permission']=="GA"){


          if(isset($_POST["edit_problem"])){
            /*
             *   POST
             */
          $problem_mobile= mysqli_real_escape_string($connect, strip_tags($_POST["problem_mobile"]));
          $department_detail= mysqli_real_escape_string($connect, strip_tags($_POST["department_detail"]));
          $problem_title    = mysqli_real_escape_string($connect, strip_tags($_POST["problem_title"]));
          $problem_description = mysqli_real_escape_string($connect, strip_tags($_POST["problem_description"]));
          $problem_status = mysqli_real_escape_string($connect, strip_tags($_POST["problem_status"]));
          $problem_status_description = mysqli_real_escape_string($connect, strip_tags($_POST["problem_status_description"]));
          $problem_admin    = $_SESSION['user_name']." ".$_SESSION['user_lastname'];
          $reg_date         = mysqli_real_escape_string($connect, strip_tags($_POST["reg_date"]));


          /*
          *   SQL
          */
          $update_problem ="UPDATE posts SET problem_mobile='$problem_mobile' ,department_detail='$department_detail' ,problem_title='$problem_title' , problem_description='$problem_description' , problem_status='$problem_status' , problem_status_description='$problem_status_description' , problem_admin='$problem_admin' , reg_date='$reg_date' WHERE problem_id='$problem_id' ";
          $result_update_problem = mysqli_query($connect, $update_problem);

          // GO
          header("Location: /dashboard/edit-problem&problem_id=$problem_id");
          }



          if(isset($_POST["delete_problem"])){


          $insert_del_problem="INSERT INTO del_posts (department_detail , user_detail , problem_mobile , problem_title , problem_description , problem_status , problem_admin , problem_status_description) VALUES ('".$department_detail."' , '".$user_detail."' , '".$problem_mobile."' , '".$problem_title."' , '".$problem_description."', '".$problem_status."', '".$problem_admin."', '".$problem_status_description."')";

          $result_insert_del_problem = mysqli_query($connect, $insert_del_problem);


          $delete_problem ="DELETE FROM posts WHERE problem_id='$problem_id' ";  
          $result_delete_problem = mysqli_query($connect, $delete_problem);

          // GO
          header("Location: /dashboard/deleted-problems&action=problem-deleted");

          }  




     }//end GA

        
    if (($_SESSION['user_permission']=="U") && ($problem_status=="P")){


          if(isset($_POST["edit_problem"])){
            /*
             *   POST
             */
          $problem_mobile   = mysqli_real_escape_string($connect, strip_tags($_POST["problem_mobile"]));
          $department_detail= mysqli_real_escape_string($connect, strip_tags($_POST["department_detail"]));
          $problem_title    = mysqli_real_escape_string($connect, strip_tags($_POST["problem_title"]));
          $problem_description = mysqli_real_escape_string($connect, strip_tags($_POST["problem_description"]));

          /*
          *   SQL
          */
          $update_problem ="UPDATE posts SET problem_mobile='$problem_mobile' ,department_detail='$department_detail' ,problem_title='$problem_title' , problem_description='$problem_description' WHERE problem_id='$problem_id' ";
          $result_update_problem = mysqli_query($connect, $update_problem);

          // GO
          header("Location: /dashboard/edit-problem&problem_id=$problem_id");
          }



          if(isset($_POST["delete_problem"])){


          $insert_del_problem="INSERT INTO del_posts (department_detail , user_detail , problem_mobile , problem_title , problem_description , problem_status , problem_admin , problem_status_description) VALUES ('".$department_detail."' , '".$user_detail."' , '".$problem_mobile."' , '".$problem_title."' , '".$problem_description."', '".$problem_status."', '".$problem_admin."', '".$problem_status_description."')";

          $result_insert_del_problem = mysqli_query($connect, $insert_del_problem);


          $delete_problem ="DELETE FROM posts WHERE problem_id='$problem_id' ";  
          $result_delete_problem = mysqli_query($connect, $delete_problem);

          // GO
          header("Location: /dashboard/my-problems&action=problem-deleted");

          }  




     }//end U


    if (($_SESSION['user_permission']=="A") && ($problem_status=="P")){


          if(isset($_POST["edit_problem"])){
            /*
             *   POST
             */
          $problem_mobile   = mysqli_real_escape_string($connect, strip_tags($_POST["problem_mobile"]));
          $department_detail= mysqli_real_escape_string($connect, strip_tags($_POST["department_detail"]));
          $problem_title    = mysqli_real_escape_string($connect, strip_tags($_POST["problem_title"]));
          $problem_description = mysqli_real_escape_string($connect, strip_tags($_POST["problem_description"]));
          $problem_status = mysqli_real_escape_string($connect, strip_tags($_POST["problem_status"]));
          $problem_status_description = mysqli_real_escape_string($connect, strip_tags($_POST["problem_status_description"]));
          $problem_admin    = $_SESSION['user_name']." ".$_SESSION['user_lastname'];


          /*
          *   SQL
          */
          $update_problem ="UPDATE posts SET problem_mobile='$problem_mobile' ,department_detail='$department_detail' ,problem_title='$problem_title' , problem_description='$problem_description' , problem_status='$problem_status' , problem_status_description='$problem_status_description' , problem_admin='$problem_admin'WHERE problem_id='$problem_id' ";
          $result_update_problem = mysqli_query($connect, $update_problem);

          // GO
          header("Location: /dashboard/edit-problem&problem_id=$problem_id");
          }



          if(isset($_POST["delete_problem"])){

          $insert_del_problem="INSERT INTO del_posts (department_detail , user_detail , problem_mobile , problem_title , problem_description , problem_status , problem_admin , problem_status_description) VALUES ('".$department_detail."' , '".$user_detail."' , '".$problem_mobile."' , '".$problem_title."' , '".$problem_description."', '".$problem_status."', '".$problem_admin."', '".$problem_status_description."')";

          $result_insert_del_problem = mysqli_query($connect, $insert_del_problem);


          $delete_problem ="DELETE FROM posts WHERE problem_id='$problem_id' ";  
          $result_delete_problem = mysqli_query($connect, $delete_problem);

          // GO
          header("Location: /dashboard/my-problems&action=problem-deleted");

          }  




     }//end A







}//end problem_id

else{ die("Heç bir problem seçilmədi");}

?>

     <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
<?php
  if(!empty($_GET['action'])){
      if($_GET['action']=="send-notf"){
        echo "                       
        <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Bildiriş göndərildi.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
      }}
?>          <div class="row mb-2"> 
                <div class="col-8">
                  <h4 class="mb-1 card-title" id="title"><b>Problemi düzəlt</b></h4>
                </div>  

                <div class="col-4">
                  <?php
                  if ( ($problem_status!="P") && ($_SESSION['user_permission']=="U" || $_SESSION['user_permission']=="A") ) {  echo"                
                  <button class='btn mr-2 btn-sm btn-primary float-right d-print-none' id='print'><i class='icon-book-open' onclick=\"print()\"></i> Çap et</button> ";}
                  ?>
                </div>
            </div>  
                  <p class="mb-4 card-description" id="welcome">Problemi düzəltmək üçün aşağıdakı xanaları doldurun</p>

          <form class="forms-sample" method="POST">

              <div class="form-group">
                      <label>Problemin adı</label>
                      <input value="<?php echo $problem_title?>" required maxlength="60" type="text" name="problem_title" class="form-control" placeholder="Problemin adını daxil edin">
              </div>

              <div class="form-group">
                   <label for="exampleFormControlSelect1">Şöbə</label>
                    <select id="check" name="department_detail" class="form-control form-control-lg">
                    <option value="<?php echo  $department_detail ?>"><?php echo  $department_detail ?></option>

                    <?php $select_departments = "SELECT department_id , department_title FROM departments WHERE department_title!='$department_detail' ORDER BY department_id DESC";  
                            $result = mysqli_query($connect, $select_departments);  
                                  if(mysqli_num_rows($result) > 0)  {  
                                    while($row = mysqli_fetch_array($result)) {
                                  $department_title = $row["department_title"];
                                  echo "<option value=\"$department_title\">$department_title</option>";
                                    }
                                  }
                    ?>
                    </select>
             </div>

              <div class="form-group">
                      <label>Problemin açıqlaması</label>
                      <textarea id="check" rows="10" required type="text" name="problem_description" class="form-control"><?php echo $problem_description ?></textarea> 
              </div>

              <div class="form-group">
                      <label>Telefon</label>
                          <input id="check" class="form-control" 
                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                          type="number" maxlength="12" name="problem_mobile" placeholder="994500000000" value="<?php echo $problem_mobile;?>">
              </div>
               
              <?php 
              if($_SESSION['user_permission']!="U"){
                  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/edit-problem-admin-area.php";}
              ?>                        
 

            <div id="buttons">
              <button name="edit_problem" id="check" <?php if($_SESSION['user_permission']=="A"){echo "onclick=\"return confirm('Əgər statusu dəyişsən bir daha redaktə edə bilməyəcəyini təsdiqləyirsən?');\"";}?> type="submit" class="btn btn-primary mr-2">PROBLEMİ DÜZƏLT</button>
              <button name="delete_problem" id="check" onclick="return confirm('Silmək istədiyini təsdiqləyirsən?');"  type="submit" class="btn btn-danger">SİL</button>
              <?php

                  if ($_SESSION['user_permission']=="GA" || $_SESSION['user_permission']=="A") {
                  
                    if(isset($_POST['send_notf'])){

                      if ($problem_status=="P") {$status="Gözləmədə";}
                      else if ($problem_status=="V") {$status="Görüldü";}
                      else if ($problem_status=="D") {$status="Həll edildi";}
                      else if ($problem_status=="C") {$status="Ləğv edildi";}


                      $subject=$problem_title." [ ".$status." ]";
                      $message=$problem_status_description;

                      $get_user_permission="SELECT user_permission FROM users WHERE user_id='$user_id' LIMIT 1";
                      $r_get_user_permission = mysqli_query($connect, $get_user_permission);  

                      if(mysqli_num_rows($r_get_user_permission) > 0)  {  
                        while($row = mysqli_fetch_array($r_get_user_permission)) { 
                          $permission=$row['user_permission'];
                        }
                      }

                     $query = " INSERT INTO notf(notf_subject, notf_text , notf_permission , user_id) VALUES ('$subject', '$message' , '$permission' , '$user_id')";
                      mysqli_query($connect, $query);

                      header("Location: /dashboard/edit-problem&problem_id=$problem_id&action=send-notf");

                    } 
                    echo "
                      <button onclick=\"return confirm('Bildiriş göndərmək istəyirsən ?');\" name=\"send_notf\" class=\"btn btn-md float-right btn-info\"><i class=\"icon-bell\"></i> Bildiriş Göndər</button>
                        ";
                  }

              ?>
            </div>  
          </form>

                </div>
              </div>
            </div>







            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php 
          if( ($problem_status!="P") && ($_SESSION['user_permission']!="GA")) {
                    echo "<div id=\"admin_response\"></div>";
          }


          else{
                echo '
                  <ul class="bullet-line-list">
                      <h4 class="mb-4">İstifadə qaydaları</h4>
                    <li>
                      <h6>İstifadəçinin emaili</h6>
                      <p class="mb-2">email unikal olub yalnız bir dəfə istifadə edilə bilinər</p>
                    </li>
                    <li>
                      <h6>Ad və SoyAdın daxil edilməsi</h6>
                      <p class="mb-2">ad və soyad ayrılıqda hər biri minimum 4 simvoldan ibarət olmalıdır</p>
                    </li>                                                     
                  </ul>';
          }?>

                </div>
              </div>
            </div>


          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container --> 