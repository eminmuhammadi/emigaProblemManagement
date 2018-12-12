             <h4 class="mb-1 mt-5 card-title"><b>Administrator hissəsi</b></h4>
              <p class="mb-4 card-description">aşağıdakı xanaları ancaq icarçı nümayəndələr doldura bilər</p>

              <div class="form-group">
                      <label>Problemin statusu</label>
            <select id="check2" name="problem_status" class="form-control form-control-lg">
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
                      <textarea rows="10" required type="text" name="problem_status_description" class="form-control"><?php echo $problem_status_description ?></textarea>
              </div>    
              <div class="form-group">
                      <label>Problemin adminini seç</label>
                      <select name="department_user_id" class="form-control form-control-lg">                      
                      <option selected value="<?php echo $department_user_id ;?>">
                        <?php
                         $user_selected ="SELECT user_name , user_lastname FROM users WHERE user_permission!='U' && user_id='$department_user_id' LIMIT 1";
                         $r_user_selected = mysqli_query($connect, $user_selected);  
                          /*
                           *   Variables   
                           */
                         if(mysqli_num_rows($r_user_selected) > 0){  
                               while($row = mysqli_fetch_array($r_user_selected)){ 
                                $user_worker=$row["user_name"]." ".$row["user_lastname"];
                                echo $user_worker;
                            }
                          }                        
                          ?>                          
                        </option>
                        <?php
                         $user_selected ="SELECT user_name , user_lastname , user_id FROM users WHERE user_permission!='U' && user_id!='$department_user_id' ORDER BY user_id DESC";
                         $r_user_selected = mysqli_query($connect, $user_selected);  
                          /*
                           *   Variables   
                           */
                         if(mysqli_num_rows($r_user_selected) > 0){  
                               while($row = mysqli_fetch_array($r_user_selected)){ 
                                echo "<option value=".$row["user_id"].">".$row["user_name"]." ".$row["user_lastname"]."</option> ";
                            }
                          }    
                        ?>                         
                      </select>
              </div>                       
              <div class="form-group">
                      <label>Problemin Qeydiyyata düşmə tarixi</label>
                      <input id="reg_date" value="<?php echo emigaDateFormatter($reg_date,"setvalue")?>" required type="date" name="reg_date" class="form-control">
              </div>