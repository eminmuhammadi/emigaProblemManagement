     <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-1 card-title"><b>Problemi düzəlt</b></h4>
                  <p class="mb-4 card-description">Problemi düzəltmək üçün aşağıdakı xanaları doldurun</p>

          <form class="forms-sample" method="POST">

              <div class="form-group">
                      <label>Problemin adı</label>
                      <input value="<?php echo $problem_title?>" required maxlength="60" type="text" name="problem_title" class="form-control" placeholder="Problemin adını daxil edin">
              </div>

              <div class="form-group">
                   <label for="exampleFormControlSelect1">Şöbəni seç</label>
                    <select name="department_detail" class="form-control form-control-lg">
                    <option value="<?php echo  $department_detail ?>"><?php echo  $department_detail ?></option>
<?php $select_departments = "SELECT department_id , department_title FROM departments WHERE department_title!='$department_detail' ORDER BY department_id DESC";  
      $result = mysqli_query($connect, $select_departments);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $department_title = $row["department_title"];
      echo "<option value=\"$department_title\">$department_title</option>";}}?>
                    </select>
             </div>

              <div class="form-group">
                      <label>Problemin açıqlaması</label>
                      <input value="<?php echo $problem_description ?>" required type="text" name="problem_description" class="form-control">
              </div>

               <div class="form-group">
                      <label>Problemin Həll edilmə müddətinin başlanması</label>
                      <input value="<?php echo emigaDateFormatter($range_date_start,"setvalue")?>" required type="date" name="range_date_start" class="form-control">
              </div>
              
              <div class="form-group">
                      <label>Problemin Həll edilmə müddətinin bitməsi</label>
                      <input value="<?php echo emigaDateFormatter($range_date_end,"setvalue")?>" required type="date" name="range_date_end" class="form-control">
              </div>                           

              <h4 class="mb-1 mt-5 card-title"><b>Administrator hissəsi</b></h4>
              <p class="mb-4 card-description">aşağıdakı xanaları ancaq icarçı nümayəndələr doldura bilər</p>

              <div class="form-group">
                      <label>Problemin statusu</label>
            <select name="problem_status" class="form-control form-control-lg">
              <option value="<?php echo  $problem_status ?>">Gözləmədə</option>
              <option value="C">Ləğv edildi</option>
              <option value="V">Görüldü</option>
              <option value="D">Həll edildi</option>
            </select>
              </div>  

              <div class="form-group">
                      <label>Problemin statusunun açıqlaması</label>
                      <input value="<?php echo $problem_status_description ?>" required type="text" name="problem_status_description" class="form-control">
              </div>            
              <div class="form-group">
                      <label>Problemin Qeydiyyata düşmə tarixi</label>
                      <input value="<?php echo emigaDateFormatter($reg_date,"setvalue")?>" required type="date" name="reg_date" class="form-control">
              </div> 

              <button name="edit_problem" type="submit" class="btn btn-primary mr-2">PROBLEMİ DÜZƏLT</button>
              <button name="delete_problem" onclick="return confirm('Silmək istədiyini təsdiqləyirsən?');"  type="submit" class="btn btn-danger">SİL</button>
          </form>

                </div>
              </div>
            </div>