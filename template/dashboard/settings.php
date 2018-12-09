<?php

/*
*  SQL (get user information)
*/     
    $t=emigaToken();
    $s_u="SELECT user_name , user_lastname , user_password , user_mobile , user_email from users WHERE user_id='$u' LIMIT 1";
    $r_su= mysqli_query($connect, $s_u);
    if(mysqli_num_rows($r_su) > 0)  {
         while($r = mysqli_fetch_array($r_su)){
/*
*  Variables
*/
         $u_n  = $r['user_name'];
         $u_l  = $r['user_lastname'];
         $u_p  = $r['user_password'];
         $u_m  = $r['user_mobile'];
         $u_e  = $r['user_email'];

         
       }  
    }
    else{die("Bunu etməyə sizin səlahiyyətiniz yoxdur");}

if(isset($_POST['edit_main'])){

/*
*   POST
*/          

    $user_name=mysqli_real_escape_string($connect, strip_tags($_POST["user_name"]));  
    $user_lastname=mysqli_real_escape_string($connect, strip_tags($_POST["user_lastname"]));  
    $user_current_password=mysqli_real_escape_string($connect, strip_tags($_POST["user_current_password"])); 
    $user_current_password=md5($user_current_password);

    if ($user_current_password!=$u_p) {
    /*
     *  Cancel Update(password incorrect) 
     */
        $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];    
    header("Location: /dashboard/profile/settings&action=password-error&id=$id&d=$d");
    }   
    else {
    /*
     *  Update 
     */         
    $update_user   = "UPDATE users SET user_name='$user_name', user_lastname='$user_lastname' , token='$t' WHERE user_id='$u' "; 
    $r_update_user = mysqli_query($connect, $update_user);
    header("Location: /logout");
    }
}


if(isset($_POST['edit_password'])){

    $password1=mysqli_real_escape_string($connect, strip_tags($_POST["password1"]));
    $password2=mysqli_real_escape_string($connect, strip_tags($_POST["password2"]));

    $user_current_password=mysqli_real_escape_string($connect, strip_tags($_POST["user_current_password"]));
    $user_current_password=md5($user_current_password);

if($password1!=$password2){
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];
    header("Location: /dashboard/profile/settings&action=passwords-mismatch&id=$id&d=$d");

}


  else{
    if ($user_current_password!=$u_p) {
    /*
     *  Cancel Update(password incorrect) 
     */ 
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];    
    header("Location: /dashboard/profile/settings&action=password-error&id=$id&d=$d");
    }   
      else {

        $password=md5($password1);

        $update_user   = "UPDATE users SET user_password='$password' , token='$t' WHERE user_id='$u' "; 
        $r_update_user = mysqli_query($connect, $update_user);
        header("Location: /logout");    

      }

  }    
}




if(isset($_POST['edit_email'])){

    $user_email=mysqli_real_escape_string($connect, strip_tags($_POST["user_email"]));  
    $user_current_password=mysqli_real_escape_string($connect, strip_tags($_POST["user_current_password"])); 
    $user_current_password=md5($user_current_password);

    if ($user_current_password!=$u_p) {
    /*
     *  Cancel Update(password incorrect) 
     */ 
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];    
    header("Location: /dashboard/profile/settings&action=password-error&id=$id&d=$d");
    }   
    else {

    /*
     *  Find email is taken or not 
     */         

      $f_email="SELECT user_email FROM users WHERE user_email='$user_email' LIMIT 1";
      $r_f_email= mysqli_query($connect, $f_email);
    

         if(mysqli_num_rows($r_f_email) > 0)  {
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];
          header("Location: /dashboard/profile/settings&action=email-taken&id=$id&d=$d");

         }

          else {
    /*
     *  Update 
     */               
              $update_user   = "UPDATE users SET user_email='$user_email' , token='$t' WHERE user_id='$u' "; 
              $r_update_user = mysqli_query($connect, $update_user);
              header("Location: /logout");
          }

    }

}




if(isset($_POST['edit_mobile'])){
/*
*   POST
*/          

    $user_mobile=mysqli_real_escape_string($connect, strip_tags($_POST["user_mobile"]));  
    $user_current_password=mysqli_real_escape_string($connect, strip_tags($_POST["user_current_password"])); 
    $user_current_password=md5($user_current_password);

    if ($user_current_password!=$u_p) {
    /*
     *  Cancel Update(password incorrect) 
     */ 
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];    
    header("Location: /dashboard/profile/settings&action=password-error&id=$id&d=$d");
    }   
    else {
    /*
     *  Update 
     */         
    $update_user   = "UPDATE users SET user_mobile='$user_mobile' , token='$t' WHERE user_id='$u' "; 
    $r_update_user = mysqli_query($connect, $update_user);
    header("Location: /logout");
    }



}        


?>
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">    

    <div class="content-wrapper">            
      <div class="row">

      <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">  
          <ul class="nav nav-tabs tab-solid tab-solid-dark" role="tablist">
              
              <li class="nav-item">          
               
               <a class="nav-link active" id="main" data-toggle="tab" href="#t-main" role="tab" aria-controls="t-main" aria-selected="true"><i class="icon-user"> </i>Əsas Məlumatlar</a>

                </li>

              <li class="nav-item">          

               <a class="nav-link" id="email" data-toggle="tab" href="#t-email" role="tab" aria-controls="t-email" aria-selected="false"><i class="icon-envelope-letter"> </i>Email</a>

              </li>

              <li class="nav-item">          

              <a class="nav-link" id="password" data-toggle="tab" href="#t-password" role="tab" aria-controls="t-password" aria-selected="false"><i class="icon-settings"> </i>Şifrə</a> 
              
              </li>

             <li class="nav-item">          
     
              <a class="nav-link" id="mobile" data-toggle="tab" href="#t-mobile" role="tab" aria-controls="t-mobile" aria-selected="false"><i class="icon-phone"> </i>Telefon</a>      
              </li>

          </ul> 

      </div>
      

      <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
              <div class="card">
                <div class="row card-body">

                  <div class="col-md-8">
               <?php 
                  if (empty($_GET['action'])) {echo "<h6 class='card-title'><b>Tənzimləmələr</b></h6>";}

                  else{
                    if($_GET['action']=="password-error"){
                    echo "
                        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-question\"></i></strong>Təsdiq üçün yazılmış şifrə sizin şifrəniz ilə uyğun deyil.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                        </div>";}
                    else if($_GET['action']=="email-taken"){
                    echo "
                        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-question\"></i></strong>Daxil etdiyiniz email artıq istifadə edilmişdir.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                        </div>";}   
                    else if($_GET['action']=="passwords-mismatch"){
                    echo "
                        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-question\"></i></strong>Daxil etdiyiniz şifrələr bir-biriləri ilə uyğun deyil.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                        </div>";}}   
                ?>  

                    <div class="tab-content tab-content-solid">

                    <div class="tab-pane fade show active" id="t-main" role="tabpanel" aria-labelledby="t-main">

                  <!-- Esas Melumatlar -->
                  <form class="forms-sample" method="POST">

                    <div class="form-group">
                      <label>İstifadəçinin adı</label>
                      <input  required maxlength="30" minlength="3" type="text" name="user_name" class="form-control" value="<?php echo $u_n ;?>" placeholder="İstifadəçinin adını dəyişmək üçün xananı doldurun">
                    </div>


                    <div class="form-group">
                      <label>İstifadəçinin Soy Adı</label>
                      <input required maxlength="30" minlength="3" type="text" name="user_lastname" class="form-control" value="<?php echo $u_l ;?>" placeholder="İstifadəçinin soy adını dəyişmək üçün xananı doldurun">
                    </div>

                    <div class="form-group">
                      <label>İstifadəçinin indiki şifrəsi (təsdiqləmək üçün)</label>
                      <input required maxlength="32" minlength="6" type="password" name="user_current_password" class="form-control" autocomplete="Off" placeholder="İstifadəçinin indiki şifrəsini daxil edin">
                    </div>

                    <button type="submit" name="edit_main" class="btn btn-primary mr-2">Təsdiqlə</button>
                  </form>


                      </div>

                    <div class="tab-pane fade" id="t-mobile" role="tabpanel" aria-labelledby="t-mobile">
                          

                  <!-- Telefon -->
                  <form class="forms-sample" method="POST">

                    <div class="form-group">
                      <label>İstifadəçinin Telefonu</label>
                          <input required class="form-control" 
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   type="number" 
                                   maxlength="12" 
                                   value="<?php echo $u_m;?>" 
                                   name="user_mobile" 
                                   placeholder="994500000000">
                    </div>

                    <div class="form-group">
                      <label>İstifadəçinin indiki şifrəsi (təsdiqləmək üçün)</label>
                      <input required maxlength="32" minlength="6" type="password" name="user_current_password" class="form-control" autocomplete="Off" placeholder="İstifadəçinin indiki şifrəsini daxil edin">
                    </div>

                    <button type="submit" name="edit_mobile"  class="btn btn-primary mr-2">Təsdiqlə</button>
                  </form>


                      </div>

                    <div class="tab-pane fade" id="t-email" role="tabpanel" aria-labelledby="t-email">
                          

                  <!-- İstifadəçinin emaili -->
                  <form class="forms-sample" method="POST">

                    <div class="form-group">
                      <label>İstifadəçinin emaili</label>
                      <input value="<?php echo $u_e ;?>" required maxlength="256" type="email" name="user_email" class="form-control" placeholder="İstifadəçinin emailini dəyişmək üçün xananı doldurun">
                    </div>

                    <div class="form-group">
                      <label>İstifadəçinin indiki şifrəsi (təsdiqləmək üçün)</label>
                      <input required maxlength="32" minlength="6" type="password" name="user_current_password" class="form-control" autocomplete="Off" placeholder="İstifadəçinin indiki şifrəsini daxil edin">
                    </div>

                    <button type="submit" name="edit_email" class="btn btn-primary mr-2">Təsdiqlə</button>
                  </form>


                      </div>

                    <div class="tab-pane fade" id="t-password" role="tabpanel" aria-labelledby="t-password">
                       

                  <form class="forms-sample" method="POST">

                    <div class="form-group">
                      <label>İstifadəçinin dəyişmək üçün nəzərdə tutduğu şifrə</label>
                      <input maxlength="32" minlength="6" type="password" name="password1" class="form-control" autocomplete="Off" placeholder="İstifadəçinin dəyişmək üçün nəzərdə tutduğu şifrəni daxil edin">
                    </div>

                    <div class="form-group">
                      <label>Həmin şifrənin təkrarı</label>
                      <input maxlength="32" minlength="6" type="password" name="password2" class="form-control" autocomplete="Off" placeholder="İstifadəçinin dəyişmək üçün nəzərdə tutduğu şifrənin təkrarını daxil edin">
                    </div>

                    <div class="form-group">
                      <label>İstifadəçinin indiki şifrəsi (təsdiqləmək üçün)</label>
                      <input required maxlength="32" minlength="6" type="password" name="user_current_password" class="form-control" autocomplete="Off" placeholder="İstifadəçinin indiki şifrəsini daxil edin">
                    </div>                    

                  <button type="submit" name="edit_password" class="btn btn-primary mr-2">Təsdiqlə</button>
                  </form>

                      </div>


                    </div>
                 </div>   

                  <div class="col-md-4">
      <?php
      if ($_SESSION['user_permission']=="U")  {$status="İstifadəçi";}
      if ($_SESSION['user_permission']=="GA") {$status="Böyük Administrator";}
      if ($_SESSION['user_permission']=="A")  {$status="Administrator";}?>                  
          <table class="mb-5 mt-2 table table-responsive">
                      <tbody>
                        <tr>
                          <td>Ad :</td>
                          <td><?php echo $_SESSION['user_name'];?></td>                          
                        </tr>
                        <tr>
                          <td>Soy Ad :</td>
                          <td><?php echo $_SESSION['user_lastname'];?></td>                          
                        </tr> 
                         <tr>
                          <td>Vəzifə :</td>
                          <td><?php echo $status;?></td>                          
                        </tr>                       
                        <tr>
                          <td>Email :</td>
                          <td><?php echo $_SESSION['user_email'];?></td>                          
                        </tr>                                                              
                        <tr>
                          <td>Telefon :</td>
                          <td><?php echo "+".$_SESSION['user_mobile'];?></td>                          
                        </tr>                         
                      </tbody>
          </table>


                  </div>  




                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->