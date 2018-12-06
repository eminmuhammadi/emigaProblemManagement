<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
<!--  --------------- -->
<?php
if(!empty($_GET['department_id'])){
  /*
   *   Get Department Information
   */
       $department_id = $_GET['department_id'];


         /* 
          *    SQL
          */
          $get_department_inf ="SELECT department_id , department_title , department_desc ,department_space, department_room FROM departments WHERE department_id='$department_id'";
          $result_department_inf = mysqli_query($connect, $get_department_inf);  
         /*
          *   Variables   
          */
        if(mysqli_num_rows($result_department_inf) > 0){  
              while($row = mysqli_fetch_array($result_department_inf)){ 
                     $department_title=$row["department_title"];
                     $department_desc=$row["department_desc"];
                     $department_space=$row["department_space"];
                     $department_room=$row["department_room"];
              }
        }

        /* ~Empty DB~ */
        else {  
                  die("Heç bir şöbə tapılmadı.");
        }

         /*
          *  Delete Department  
          */

          if(isset($_POST["delete_department"])){   

         /*
          *  SQL
          */  

          $delete_department ="DELETE FROM departments WHERE department_id='$department_id' ";  
          $result_delete_department = mysqli_query($connect, $delete_department);

          // GO
          header("Location: /dashboard/departments&action=department-deleted");
          } 

         /*
          *  Edit Department
          */

        if(isset($_POST["edit_department"]))  { 

          /*
          *  POST
          */    

            $department_name=mysqli_real_escape_string($connect, strip_tags($_POST["department_name"]));
            $department_description=mysqli_real_escape_string($connect, strip_tags($_POST["department_description"]));  
            $department_space=mysqli_real_escape_string($connect, strip_tags($_POST["department_space"]));
            $department_room=mysqli_real_escape_string($connect, strip_tags($_POST["department_room"]));

          /*
          *   SQL
          */
          $update_department =" UPDATE departments SET department_title='$department_name' , department_desc='$department_description' , department_room='$department_room', department_space='$department_space' WHERE department_id='$department_id' "; 
          $result_department_inf = mysqli_query($connect, $update_department);

          // GO
          header("Location: /dashboard/edit-department&department_id=$department_id");
        }
}

/* ~ ID failed ~ */
else{
      die("Heç bir şöbə seçilmədi.");
    }
?>
        <div class="col-md-8 grid-margin stretch-card">
           <div class="card">
              <div class="card-body">


                  <h4 class="mb-1 card-title"><b>Şöbəni Düzəlt</b></h4>
                  <p class="mb-4 card-description">Şöbəni düzəltmək üçün aşağıdakı xanaları doldurun</p>

  <form class="forms-sample" method="POST">


              <div class="form-group">
                      <label>Şöbənin adı</label>
                      <input value="<?php echo $department_title;?>" required maxlength="60" type="text" name="department_name" class="form-control" placeholder="Şöbənin adını daxil edin">
              </div>


              <div class="form-group">
                      <label>Şöbənin korpusu</label>
                      <input value="<?php echo $department_space;?>" required maxlength="60" type="text" name="department_space" class="form-control" placeholder="Şöbənin korpusunu daxil edin">
              </div>


              <div class="form-group">
                      <label>Şöbənin otağı</label>
                      <input value="<?php echo $department_room;?>" required maxlength="60" type="text" name="department_room" class="form-control" placeholder="Şöbənin otağını daxil edin">
              </div>  


              <div class="form-group">
                      <label>Şöbə haqqında məlumat</label>
                      <textarea required type="text" rows="5" name="department_description" class="form-control" placeholder="Şöbə haqqında məlumatı daxil edin"><?php echo $department_desc;?></textarea>
              </div>   


      <button name="edit_department" type="submit" class="btn btn-primary mr-2">DÜZƏLT</button>
      <button name="delete_department" onclick="return confirm('Silmək istədiyini təsdiqləyirsən?');" type="submit" class="btn btn-danger">SİL</button>
  </form>
          </div>
      </div>
  </div>



  <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">

                  <!-- Content -->
                  <ul class="bullet-line-list">
                      <h4 class="mb-4">İstifadə qaydaları</h4>
                    <li>
                      <h6>Şöbənin adı</h6>
                      <p class="mb-2">Problemin izahı şöbənin adı ilə bağlı olduğundan düzgün yazılması vacibdir</p>
                    </li>
                    <li>
                      <h6>Şöbə haqqında məlumat</h6>
                      <p class="mb-2">Qısa şəkildə şöbəni izah edin</p>
                    </li>     
                     <li>
                      <h6>Şöbənin korpusu və otağı</h6>
                      <p class="mb-2">Şöbənin məntəqəsini təyin edir</p>
                    </li>                                
                  </ul>

            </div>
      </div>
  </div>

          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->