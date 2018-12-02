<?php
if(isset($_POST['create_department'])){ 

    $department_name    = mysqli_real_escape_string($connect, $_POST["department_name"]); 
    $department_description = mysqli_real_escape_string($connect,$_POST["department_description"]);
 
    
    $add_department ="INSERT INTO departments (department_title , department_desc) VALUES ('".$department_name."' , '".$department_description."' )";
    $result = mysqli_query($connect, $add_department);  

    header("Location: /dashboard/departments&action=department-added"); 

}
?>
<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!--  --------------- -->


            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-1 card-title"><b>Şöbə Yarat</b></h4>
                  <p class="mb-4 card-description">Şöbəni yaratmaq üçün aşağıdakı xanaları doldurun</p>

          <form class="forms-sample" method="POST">
              <div class="form-group">
                      <label>Şöbənin adı</label>
                      <input required maxlength="60" type="text" name="department_name" class="form-control" placeholder="Şöbənin adını daxil edin">
              </div>
              <div class="form-group">
                      <label>Şöbə haqqında məlumat</label>
                      <input required type="text" name="department_description" class="form-control" placeholder="Şöbə haqqında məlumatı daxil edin">
              </div>
              <button name="create_department" type="submit" class="btn btn-primary mr-2">ŞÖBƏ YARAT</button>
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
