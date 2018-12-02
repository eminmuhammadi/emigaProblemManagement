<!-- Start Template -->
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
$get_department_inf ="SELECT department_id , department_title , department_desc FROM departments WHERE department_id='$department_id' ";  
$result_department_inf = mysqli_query($connect, $get_department_inf);  
    if(mysqli_num_rows($result_department_inf) > 0){  
      while($row = mysqli_fetch_array($result_department_inf)){ 
        $get_department_title=$row["department_title"];
        $get_department_desc=$row["department_desc"];}}
           else {die("Heç bir şöbə tapılmadı.");}
/*
*  Delete Department  
*/
if(isset($_POST["delete_department"])){       
  $delete_department ="DELETE FROM departments WHERE department_id='$department_id' ";  
  $result_delete_department = mysqli_query($connect, $delete_department);
  echo"<script>window.location.href = \"/dashboard/departments&action=department-deleted\";</script>";} 
/*
*  Edit Department
*/
if(isset($_POST["edit_department"]))  { 
  $department_name=mysqli_real_escape_string($connect, $_POST["department_name"]);
  $department_description=mysqli_real_escape_string($connect, $_POST["department_description"]);  
  $update_department =" UPDATE departments SET department_title='$department_name' , department_desc='$department_description' WHERE department_id='$department_id' "; 
  $result_department_inf = mysqli_query($connect, $update_department);
    echo"<script>window.location.href = \"/dashboard/edit-department&department_id=$department_id\";</script>";}}//end empty
else{die("Heç bir şöbə seçilmədi.");}
?>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-1 card-title"><b>Şöbəni Düzəlt</b></h4>
                  <p class="mb-4 card-description">Şöbəni düzəltmək üçün aşağıdakı xanaları doldurun</p>

          <form class="forms-sample" method="POST">
              <div class="form-group">
                      <label>Şöbənin adı</label>
                      <input required value="<?php echo $get_department_title?>" maxlength="60" type="text" name="department_name" class="form-control" placeholder="Şöbənin adını daxil edin">
              </div>
              <div class="form-group">
                      <label>Şöbə haqqında məlumat</label>
                      <input required value="<?php echo $get_department_desc?>" type="text" name="department_description" class="form-control" placeholder="Şöbə haqqında məlumatı daxil edin">
              </div>
              <button name="edit_department" type="submit" class="btn btn-primary mr-2">ŞÖBƏNI DÜZƏLT</button>
              <button name="delete_department" type="submit" class="btn btn-danger">SİL</button>
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
