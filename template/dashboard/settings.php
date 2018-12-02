<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
<!--  --------------- -->
<?php
/*
*  Delete User  
*/
if(isset($_POST["delete_user"])){   
  $ses_user_id=$_SESSION['user_id'];    
  $delete_user ="DELETE FROM users WHERE user_id='$ses_user_id' ";  
  $result_delete_user = mysqli_query($connect, $delete_user);
  header("Location: /logout");} 
/*
*  Edit User
*/
if(isset($_POST["edit_user"]))  { 
  $user_password=mysqli_real_escape_string($connect, $_POST["user_password"]);
  $user_password_re=mysqli_real_escape_string($connect, $_POST["user_password_re"]);

  if($user_password==$user_password_re){
  $user_email=mysqli_real_escape_string($connect,$_POST["user_email"])  ;
  /* Search email */
  $search_email ="SELECT * FROM users WHERE user_email='$user_email' && user_id!='$ses_user_id' LIMIT 1";
  $search_email_result = mysqli_query($connect, $search_email); 

    if(mysqli_num_rows($search_email_result) > 0)  {
    header("Location: /dashboard/profile/settings&action=email-wrong");exit();}
    else{
     $user_name=mysqli_real_escape_string($connect, $_POST["user_name"]);
     $user_lastname=mysqli_real_escape_string($connect, $_POST["user_lastname"]);
     $user_password=md5($user_password);
     $ses_user_id=$_SESSION['user_id'];  
        $update_user =" UPDATE users SET user_name='$user_name' , user_lastname='$user_lastname' ,
        user_email='$user_email',user_password='$user_password' WHERE user_id='$ses_user_id' "; 
        $result_update_user = mysqli_query($connect, $update_user);
    }
  }
  else{header("Location: /dashboard/profile/settings&action=password-wrong");exit();}
  header("Location: /logout");exit();
  } 
?>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-1 card-title"><b>Hesab üzərində əməllər</b></h4>
                  <p class="mb-4 card-description">Hesabı düzəltmək üçün aşağıdakı xanaları doldurun</p>
<?php
  if(!empty($_GET['action'])){
      if($_GET['action']=="email-wrong"){
        echo "                       
        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Bu Email artıq istifadə edilib.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
      }
      else if($_GET['action']=="password-wrong"){
        echo "                       
        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Şifrələr uyğunsuzdur.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
      }}
?>
          <form class="forms-sample" method="POST">
              <div class="form-group">
                      <label>Email</label>
            <input required name="user_email" value="<?php echo $_SESSION['user_email'];?>" type="email" class="form-control">
              </div>

              <div class="form-group">
                      <label>Ad</label>
              <input required value="<?php echo $_SESSION['user_name'];?>" type="text" name="user_name" class="form-control" maxlength="30">
              </div>

              <div class="form-group">
                      <label>Soy Ad</label>
              <input required value="<?php echo $_SESSION['user_name'];?>" type="text" name="user_lastname" maxlength="30" class="form-control">
              </div>

              <div class="form-group">
                      <label>Şifrə</label>
              <input required  minlength="6" maxlength="32" type="password" name="user_password" class="form-control">
              </div>

              <div class="form-group">
                      <label>Şifrəni təsdiqlə</label>
              <input required  minlength="6" maxlength="32" type="password" name="user_password_re" class="form-control">
              </div>

        <button name="edit_user" type="submit" class="btn btn-primary mr-2">HESABI DÜZƏLT</button>
        <button name="delete_user" type="submit" class="btn btn-danger">HESABI SİL</button>
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
                      <h6>İstifadəçinin emaili</h6>
                      <p class="mb-2">email unikal olub yalnız bir dəfə istifadə edilə bilinər</p>
                    </li>
                    <li>
                      <h6>Ad və SoyAdın daxil edilməsi</h6>
                      <p class="mb-2">ad və soyad ayrılıqda hər biri minimum 4 simvoldan ibarət olmalıdır</p>
                    </li>   
                     <li>
                      <h6>Şifrənin daxil edilməsi</h6>
                      <p class="mb-2">Şifrə minimum 6 simvoldan ibarətdir və heç bir məhdudiyyət yoxdur</p>
                    </li>    
                     <li>
                      <h6>Şifrənin təkrar edilməsi</h6>
                      <p class="mb-2">Şifrə təkrar edilməsi zamanı öncəki şifrənin doğru yazılması yoxlanılır</p>
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
