<?php
if(isset($_POST['create_problem'])){ 

    /*
    *  POST
    */
       $user_detail = $_SESSION['user_name']." ".$_SESSION['user_lastname'];
       $user_detail = mysqli_real_escape_string($connect, strip_tags($user_detail)); 
       $problem_title = mysqli_real_escape_string($connect, strip_tags($_POST["problem_title"])); 
       $department_detail = mysqli_real_escape_string($connect,strip_tags($_POST["department_detail"]));
       $problem_description = mysqli_real_escape_string($connect, strip_tags($_POST["problem_description"])); 
      $problem_phone = mysqli_real_escape_string($connect,strip_tags($_POST["problem_phone"]));
      $problem_mobile = mysqli_real_escape_string($connect, strip_tags($_POST["problem_mobile"])); 

    /*
    *  SQL  
    */  

    $add_problem ="INSERT INTO posts (user_detail , problem_title , department_detail , problem_description , problem_mobile , problem_phone) VALUES ('".$user_detail."' , '".$problem_title."' , '".$department_detail."' , '".$problem_description."' , '".$problem_mobile."', '".$problem_phone."')";
    $result = mysqli_query($connect, $add_problem);

    /* ~GO~ */  
    header("Location: /dashboard/my-problems&action=problem-added");}
?>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">


            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">

                  <h4 class="mb-1 card-title"><b>Problemini yaz</b></h4>
                  <p class="mb-4 card-description">Problemi yaratmaq üçün aşağıdakı xanaları doldurun</p>

        <form class="forms-sample" method="POST" id="add_problem">

              <div class="form-group">
                      <label>Problemin adı</label>
                      <input required maxlength="60" type="text" name="problem_title" class="form-control" placeholder="Problemin adını daxil edin">
              </div>

              <div class="form-group">
                    <label for="exampleFormControlSelect1">Şöbəni seç</label>
                    <select name="department_detail" class="form-control form-control-lg">
            <?php 

                /*
                *  SQL
                */

                $select_departments ="SELECT department_id , department_title FROM departments ORDER BY department_id DESC";  
                $result = mysqli_query($connect, $select_departments);  

               /*
               *  Departments Row
               */
               if(mysqli_num_rows($result) > 0)  {  
               while($row = mysqli_fetch_array($result)) {
                   $department_title = $row["department_title"];
                   echo "<option value=\"$department_title\">$department_title</option>";}}
               else{
                    echo "<option hidden selected>Administratorlar tərəfindən heç bir şöbə yaradılmayıb</option>";}
            ?>
                    </select>
             </div>

              <div class="form-group">
                      <label>Problemin açıqlaması</label>
                      <textarea required rows="5" type="text" name="problem_description" class="form-control" placeholder="Problemin açıqlamasını daxil edin"></textarea>
              </div>


              <div class="form-group">
                      <label>Mobil Telefonu</label>
                          <input class="form-control" 
                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                          type="number" maxlength="12" name="problem_mobile" placeholder="994500000000">
                      <label class="mt-3">Ev Telefonu</label>                       
                          <input class="form-control"
                          oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                             type = "number" name="problem_phone" placeholder="994500000000" maxlength="12">
              </div>
              <button name="create_problem" type="submit" class="btn btn-primary mr-2">PROBLEMİNİ YAZ</button>
                          <div style="height:40px;"></div>
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
                  </ul>

                </div>
              </div>
            </div>

          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->