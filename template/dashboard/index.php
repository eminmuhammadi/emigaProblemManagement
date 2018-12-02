<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card card-statistics">
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-md-6 col-lg-3">

                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>
<?php
        $get_count_P_posts = mysqli_query($connect, 
                "SELECT problem_status FROM posts WHERE problem_status='P' "
        );
             $count = mysqli_num_rows($get_count_P_posts);
             if(empty($count)){$count="0";}
             echo $count;
?>                            
                          </h1>
                          <p class="text-muted mb-0">Gözləmədə olan problemlər</p>
                        </div>
                        <i class="icon-layers text-primary icon-lg"></i>
                      </div>


                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>
<?php
        $get_count_users = mysqli_query($connect, 
                "SELECT user_id FROM users"
        );
             $count = mysqli_num_rows($get_count_users);
             if(empty($count)){$count="0";}
             echo $count;
?>                             
                          </h1>
                          <p class="text-muted mb-0">İstifadəçilərin sayı</p>
                        </div>
                        <i class="icon-people text-dark icon-lg"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>
<?php
        $get_count_C_posts = mysqli_query($connect, 
                "SELECT problem_status FROM posts WHERE problem_status='C' "
        );
             $count = mysqli_num_rows($get_count_C_posts);
             if(empty($count)){$count="0";}
             echo $count;
?>                              
                          </h1>
                          <p class="text-muted mb-0">Ləğv edilmiş problemlər</p>
                        </div>
                        <i class="icon-trash text-danger icon-lg"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between card-statistics-item">
                        <div>
                          <h1>
<?php
        $get_count_D_posts = mysqli_query($connect, 
                "SELECT problem_status FROM posts WHERE problem_status='D' "
        );
             $count = mysqli_num_rows($get_count_D_posts);
             if(empty($count)){$count="0";}
             echo $count;
?>                              
                          </h1>
                          <p class="text-muted mb-0">Həll edilmiş problemlər</p>
                        </div>
                        <i class="icon-check text-success icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
     <div class="row">     
       <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><u>Gözləmədə</u> olan ən son problemlər</h4>
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Problemin adı</th>
                        <th>Şöbə</th>
                        <th>Tarix</th>
                      </tr>
                    </thead>
                    <tbody>               
<?php 
      $select_posts ="SELECT  problem_title , department_detail , reg_date FROM posts WHERE problem_status='P' ORDER BY problem_id DESC LIMIT 5";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $problem_title        = $row["problem_title"];
      $department_detail    = $row["department_detail"];
      $reg_date    = emigaDateFormatter($row["reg_date"]);
      echo "
                      <tr>
                        <td>
                          <div class=\"disc bg-secondary\"></div>
                        </td> 
                        <td>
                          <h4 class=\"text-primary font-weight-normal\">$problem_title</h4>
                        </td>
                        <td>
                          <h4 class=\"text-primary font-weight-normal\">$department_detail</h4>
                        </td>                        
                        <td>
                          <h4 class=\"text-primary font-weight-normal\">$reg_date</h4>
                        </td>    
                        </tr>                    
      ";}}
?>
                    </tbody>
                  </table>
                </div>
              </div>
         </div>   

       <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><u>Həll edilmiş</u> olan ən son problemlər</h4>
                  <table class="table">
                    <thead>
                      <tr>

                        <th></th>
                        <th>Problemin adı</th>
                        <th>Şöbə</th>
                        <th>Tarix</th>

                      </tr>
                    </thead>
                    <tbody>
<?php 
      $select_posts ="SELECT problem_title , department_detail , reg_date FROM posts WHERE problem_status='D' ORDER BY problem_id DESC LIMIT 5";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $problem_title        = $row["problem_title"];
      $department_detail    = $row["department_detail"];
      $reg_date    = emigaDateFormatter($row["reg_date"]);
      echo "
                      <tr>
                        <td>
                          <div class=\"disc bg-secondary\"></div>
                        </td> 
                        <td>
                          <h4 class=\"text-primary font-weight-normal\">$problem_title</h4>
                        </td>
                        <td>
                          <h4 class=\"text-primary font-weight-normal\">$department_detail</h4>
                        </td>                        
                        <td>
                          <h4 class=\"text-primary font-weight-normal\">$reg_date</h4>
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
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ən son qatılanlar</h4>
<?php 
      $select_posts ="SELECT user_name , user_lastname , reg_date FROM users ORDER BY user_id DESC LIMIT 5";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $user_name        = $row["user_name"];
      $user_lastname    = $row["user_lastname"];
      $reg_date    = emigaDateFormatter($row["reg_date"]);
      echo "
                <div class=\"d-flex pb-3\">
                    <div>
                      <h6>$user_name $user_lastname</h6>
                      <p class=\"text-muted mb-0\">$reg_date</p>
                    </div>   
                  </div>              
      ";}}
?>                    




                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card bg-primary text-white card-update">
                <div class="card-body">
                  <h4 class="card-title text-white"><u>Ləğv edilmiş</u> problemlər</h4>
<?php 
      $select_posts ="SELECT problem_title , user_detail , department_detail , problem_status_description , reg_date FROM posts WHERE problem_status='C' ORDER BY problem_id DESC LIMIT 5";  
      $result = mysqli_query($connect, $select_posts);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $problem_status_description    = $row["problem_status_description"];   
      $problem_title        = $row["problem_title"];
      $department_detail    = $row["department_detail"];
      $user_detail    = $row["user_detail"];
      $reg_date    = emigaDateFormatter($row["reg_date"]);
      echo "

                  <div class=\"d-flex pb-4 update-item\">
                    <div>
                      <h6 class=\"text-white font-weight-medium d-flex\">$user_detail &mdash; $problem_title 
                      &nbsp;
                        <span class=\"small ml-auto\">$reg_date</span>
                      </h6>
                      <p>$problem_status_description</p>
                    </div>
                  </div>                
      ";}}
      else{echo "Heç bir ləğv edilmiş məlumat yoxdur";}
?>



                </div>
              </div>
            </div>
          </div>
    
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/footer.php"; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
