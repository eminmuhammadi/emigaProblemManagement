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

      $select_del_posts ="SELECT * FROM del_posts WHERE problem_id='$problem_id' ";  
      $result = mysqli_query($connect, $select_del_posts);  

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


          if(isset($_POST["delete_problem"])){

          $delete_problem ="DELETE FROM del_posts WHERE problem_id='$problem_id' ";  
          $result_delete_problem = mysqli_query($connect, $delete_problem);

          // GO
          header("Location: /dashboard/deleted-problems&action=problem-deleted");

          }  


     }//end GA



}//end problem_id

else{ die("Heç bir problem seçilmədi");}

?>

     <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
          <h4 class="mb-1 card-title" id="title"><b>Silinmiş problem #<?php echo $problem_id;?></b></h4>
                  <p class="mb-4 card-description" id="welcome">Silinmiş problemə heç bir düzəliş etmək mümkün deyil və silən zaman həmin məlumatı tamamilə itirmiş olcaqsınız.</p>

          <form class="forms-sample" method="POST">

              <div class="form-group">
                      <label>Problemin adı</label>
                      <input disabled value="<?php echo $problem_title?>" required maxlength="60" type="text" name="problem_title" class="form-control" placeholder="Problemin adını daxil edin">
              </div>

              <div class="form-group">
                   <label for="exampleFormControlSelect1">Şöbə</label>
                    <select id="check" disabled name="department_detail" class="disabled form-control form-control-lg">
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
                      <textarea disabled id="check" rows="10" required type="text" name="problem_description" class="form-control"><?php echo $problem_description ?></textarea> 
              </div>

              <div class="form-group">
                      <label>Mobil Telefonu</label>
                          <input disabled id="check" class="form-control" 
                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                          type="number" maxlength="12" name="problem_mobile" placeholder="994500000000" value="<?php echo $problem_mobile;?>">
                      <label class="mt-3">Ev Telefonu</label>                       
                          <input disabled id="check" class="form-control"
                          oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                             type = "number" name="problem_phone" placeholder="994500000000" maxlength="12"  value="<?php echo $problem_phone;?>">
              </div>
               
             <h4 class="mb-1 mt-5 card-title"><b>Administrator hissəsi</b></h4>
              <p class="mb-4 card-description">aşağıdakı xanaları ancaq icarçı nümayəndələr doldura bilər</p>

              <div class="form-group">
                      <label>Problemin statusu</label>
            <select  disabled id="check2" name="problem_status" class="form-control form-control-lg">
             <?php 
             if($_SESSION['user_permission']!="A"){

              if($problem_status=="V"){
                  echo "
              <option value=\"P\">Gözləmədə</option>
              <option value=\"C\">Ləğv edildi</option>
              <option selected value=\"V\">Görüldü</option>
              <option value=\"D\">Həll edildi</option>
                  ";
                }
                else if($problem_status=="C"){
                  echo "
              <option value=\"P\">Gözləmədə</option>
              <option selected value=\"C\">Ləğv edildi</option>
              <option value=\"V\">Görüldü</option>
              <option value=\"D\">Həll edildi</option>
                  ";
                }
                else if ($problem_status=="D"){
                  echo "
              <option value=\"P\">Gözləmədə</option>
              <option value=\"C\">Ləğv edildi</option>
              <option value=\"V\">Görüldü</option>
              <option selected value=\"D\">Həll edildi</option>
                  ";
                }
                else {
                  echo "
              <option selected value=\"P\">Gözləmədə</option>
              <option value=\"C\">Ləğv edildi</option>
              <option value=\"V\">Görüldü</option>
              <option value=\"D\">Həll edildi</option>
                  ";
                }}

              else{
              if($problem_status=="V"){
                  echo "
              <option value=\"P\">Gözləmədə</option>
              <option value=\"C\">Ləğv edildi</option>
              <option selected value=\"V\">Görüldü</option>";
                }
                else if($problem_status=="C"){
                  echo "
              <option value=\"P\">Gözləmədə</option>
              <option selected value=\"C\">Ləğv edildi</option>
              <option value=\"V\">Görüldü</option>
                  ";
                }
                else {
                  echo "
              <option selected value=\"P\">Gözləmədə</option>
              <option value=\"C\">Ləğv edildi</option>
              <option value=\"V\">Görüldü</option>";
                }
              }  
            ?>
            </select>
              </div>  

              <div class="form-group">
                      <label>Problemin statusunun açıqlaması</label>
                      <textarea disabled rows="10" required type="text" name="problem_status_description" class="form-control"><?php echo $problem_status_description ?></textarea>
              </div>            
              <div class="form-group">
                      <label>Problemin Qeydiyyata düşmə tarixi</label>
                      <input disabled id="reg_date" value="<?php echo emigaDateFormatter($reg_date,"setvalue")?>" required type="date" name="reg_date" class="form-control">
              </div> 

                          <div id="buttons">
         <button class='btn mr-2 btn-sm btn-primary float-left d-print-none' id='print'><i class='icon-book-open' onclick="print()"></i> Çap et</button>                            
         <button name="delete_problem" id="check" onclick="return confirm('Problemi birdəfəlik silmək istədiyindən əminsən?');"  type="submit" class="btn btn-sm btn-danger float-left d-print-none"><i class="icon-trash"></i> SİL</button>
                           </div>                           
          </form>

                </div>
              </div>
            </div>

          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->