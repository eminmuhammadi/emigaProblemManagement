<?php
if(isset($_POST['create_problem'])){ 

    $user_detail = $_SESSION['user_name']." ".$_SESSION['user_lastname'];
    $user_detail = mysqli_real_escape_string($connect, $user_detail); 
    $problem_title = mysqli_real_escape_string($connect, $_POST["problem_title"]); 
    $department_detail = mysqli_real_escape_string($connect,$_POST["department_detail"]);
    $problem_description = mysqli_real_escape_string($connect, $_POST["problem_description"]); 
    $range_date_start = mysqli_real_escape_string($connect,$_POST["range_date_start"]); 
    $range_date_end = mysqli_real_escape_string($connect, $_POST["range_date_end"]); 



    $add_problem ="INSERT INTO posts (user_detail , problem_title , department_detail , problem_description , range_date_start , range_date_end) VALUES ('".$user_detail."' , '".$problem_title."' , '".$department_detail."' , '".$problem_description."' , '".$range_date_start."' , '".$range_date_end."')";

    $result = mysqli_query($connect, $add_problem);  
    header("Location: /dashboard/my-problems&action=problem-added");}
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
                  <h4 class="mb-1 card-title"><b>Problem Yarat</b></h4>
                  <p class="mb-4 card-description">Problemi yaratmaq üçün aşağıdakı xanaları doldurun</p>

          <form class="forms-sample" method="POST">

              <div class="form-group">
                      <label>Problemin adı</label>
                      <input required maxlength="60" type="text" name="problem_title" class="form-control" placeholder="Problemin adını daxil edin">
              </div>

              <div class="form-group">
                    <label for="exampleFormControlSelect1">Şöbəni seç</label>
                    <select name="department_detail" class="form-control form-control-lg">
<?php 
  $select_departments ="SELECT department_id , department_title FROM departments ORDER BY department_id DESC";  
      $result = mysqli_query($connect, $select_departments);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $department_title = $row["department_title"];
      echo "<option value=\"$department_title\">$department_title</option>";}}
?>
                    </select>
             </div>

              <div class="form-group">
                      <label>Problemin açıqlaması</label>
                      <input required type="text" name="problem_description" class="form-control" placeholder="Problemin açıqlamasını daxil edin">
              </div>

               <div class="form-group">
                      <label>Problemin Həll edilmə müddətinin başlanması</label>
                      <input required type="date" name="range_date_start" class="form-control">
              </div>
              
              <div class="form-group">
                      <label>Problemin Həll edilmə müddətinin bitməsi</label>
                      <input required type="date" name="range_date_end" class="form-control">
              </div>                           



              <button name="create_problem" type="submit" class="btn btn-primary mr-2">PROBLEM YARAT</button>
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
