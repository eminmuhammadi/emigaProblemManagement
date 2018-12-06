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
            $problem_phone=$row['problem_phone'];
            $department_detail=$row['department_detail'];
            $user_detail=$row['user_detail'];
            $problem_title=$row['problem_title'];
            $problem_description=$row['problem_description'];
            $problem_status=$row['problem_status'];
            $problem_status_description=$row['problem_status_description'];
            $problem_admin=$row['problem_admin'];
            $reg_date=$row['reg_date'];
  

        }
      }
      else {die("Heç bir problem tapılmadı .");}




    if ($_SESSION['user_permission']=="GA"){


          if(isset($_POST["edit_problem"])){
            /*
             *   POST
             */
          $problem_mobile   = mysqli_real_escape_string($connect, strip_tags($_POST["problem_mobile"]));
          $problem_phone   = mysqli_real_escape_string($connect, strip_tags($_POST["problem_phone"]));
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


          $delete_problem ="DELETE FROM posts WHERE problem_id='$problem_id' ";  
          $result_delete_problem = mysqli_query($connect, $delete_problem);

          // GO
          header("Location: /dashboard/all-problems&action=problem-deleted");

          }  




     }//end GA

        
    if (($_SESSION['user_permission']=="U") && ($problem_status=="P")){


          if(isset($_POST["edit_problem"])){
            /*
             *   POST
             */
          $problem_mobile   = mysqli_real_escape_string($connect, strip_tags($_POST["problem_mobile"]));
          $problem_phone   = mysqli_real_escape_string($connect, strip_tags($_POST["problem_phone"]));
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


          $insert_del_problem="INSERT INTO del_posts (department_detail , user_detail , problem_mobile , problem_phone , problem_title , problem_description , problem_status , problem_admin , problem_status_description) VALUES ('".$department_detail."' , '".$user_detail."' , '".$problem_mobile."' , '".$problem_phone."'  , '".$problem_title."' , '".$problem_description."', '".$problem_status."', '".$problem_admin."', '".$problem_status_description."')";

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
          $problem_phone   = mysqli_real_escape_string($connect, strip_tags($_POST["problem_phone"]));
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

          $insert_del_problem="INSERT INTO del_posts (department_detail , user_detail , problem_mobile , problem_phone , problem_title , problem_description , problem_status , problem_admin , problem_status_description) VALUES ('".$department_detail."' , '".$user_detail."' , '".$problem_mobile."' , '".$problem_phone."'  , '".$problem_title."' , '".$problem_description."', '".$problem_status."', '".$problem_admin."', '".$problem_status_description."')";

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
                  <h4 class="mb-1 card-title" id="title"><b>Problemi düzəlt</b></h4>
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
                      <label>Mobil Telefonu</label>
                          <input id="check" class="form-control" 
                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                          type="number" maxlength="12" name="problem_mobile" placeholder="994500000000" value="<?php echo $problem_mobile;?>">
                      <label class="mt-3">Ev Telefonu</label>                       
                          <input id="check" class="form-control"
                          oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                             type = "number" name="problem_phone" placeholder="994500000000" maxlength="12"  value="<?php echo $problem_phone;?>">
              </div>
               
              <?php 
              if($_SESSION['user_permission']!="U"){
                  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/permission/edit-problem-admin-area.php";}
              ?>                        
 

            <div id="buttons">
              <button name="edit_problem" id="check" <?php echo "onclick=\"return confirm('Əgər statusu dəyişsən bir daha redaktə edə bilməyəcəyini təsdiqləyirsən?');\"";?> type="submit" class="btn btn-primary mr-2">PROBLEMİ DÜZƏLT</button>
              <button name="delete_problem" id="check" onclick="return confirm('Silmək istədiyini təsdiqləyirsən?');"  type="submit" class="btn btn-danger">SİL</button>
            </div>  
          </form>

                </div>
              </div>
            </div>







            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                <?php if($problem_status!="P"){
                    echo "<div id=\"admin_response\"></div>";
                }
                else{
                echo `
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
                  </ul>`;
                }?>
                </div>
              </div>
            </div>


          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container --> 