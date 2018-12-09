<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
<!--  --------------- -->
<?php
  if(!empty($_GET['user_id'])){
    /*
    *   Get Problem Information
    */
    $user_id = $_GET['user_id'];
    $get_user_inf ="SELECT user_name , user_lastname , user_password , user_permission , user_email , user_department_detail , user_mobile FROM users WHERE user_id='$user_id' ";  
    $result_user_inf = mysqli_query($connect, $get_user_inf);  
    if(mysqli_num_rows($result_user_inf) > 0){  
      while($row = mysqli_fetch_array($result_user_inf)){ 
        $user_name   = $row["user_name"];
        $user_lastname   = $row["user_lastname"];
        $user_password   = $row["user_password"];
        $user_permission = $row["user_permission"];
        $user_email      = $row["user_email"];
        $user_mobile     = $row["user_mobile"];        
        $user_department_detail = $row["user_department_detail"];
        }
    }
    /*
    *   Problem not found
    */
    else {die("Heç bir istifadəçi tapılamadı.");}
    /*
    *  Delete User  
    */
    if(isset($_POST["delete_user"])){   
      $delete_user ="DELETE FROM users WHERE user_id='$user_id' ";  
      $result_delete_user = mysqli_query($connect, $delete_user);
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];      
      header("Location: /dashboard/profiles&action=user-deleted&id=$id&d=$d");exit();} 
    /*
    *  Edit User
    */
if(isset($_POST["edit_user"]))  { 
  $user_email=mysqli_real_escape_string($connect,strtolower(strip_tags($_POST["user_email"])));
  $user_department_detail=mysqli_real_escape_string($connect,strip_tags($_POST["user_department_detail"]));
  /* Search email */
  $search_email ="SELECT user_email FROM users WHERE user_email='$user_email' && user_id!='$user_id' LIMIT 1";
  $search_email_result = mysqli_query($connect, $search_email); 

if(mysqli_num_rows($search_email_result) > 0)  {
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];  
    header("Location: /dashboard/edit-user-profile&user_id=$user_id&action=email-wrong&id=$id&d=$d");exit();}
    else{
     $user_name=mysqli_real_escape_string($connect, strip_tags($_POST["user_name"]));
     $user_lastname=mysqli_real_escape_string($connect, strip_tags($_POST["user_lastname"]));
     $user_permission=mysqli_real_escape_string($connect, strip_tags($_POST["user_permission"]));
     $user_mobile=mysqli_real_escape_string($connect, strip_tags($_POST["user_mobile"]));     
     $user_password=md5($user_password);
     $ses_user_id=$_SESSION['user_id'];  
     $t=emigaToken();
        $update_user =" UPDATE users SET user_name='$user_name' , user_lastname='$user_lastname' ,
        user_email='$user_email' ,user_department_detail='$user_department_detail' ,  user_mobile='$user_mobile', user_permission='$user_permission' , token='$t' WHERE user_id='$user_id' "; 
        $result_update_user = mysqli_query($connect, $update_user);
    }
}} 
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
      }}
?>
          <form class="forms-sample" method="POST">
              <div class="form-group">
                      <label>Email</label>
            <input required name="user_email" value="<?php echo $user_email;?>" type="email" class="form-control">
              </div>

              <div class="form-group">
                      <label>Ad</label>
              <input required value="<?php echo $user_name;?>" type="text" name="user_name" class="form-control" maxlength="30">
              </div>

              <div class="form-group">
                      <label>Soy Ad</label>
              <input required value="<?php echo $user_lastname;?>" type="text" name="user_lastname" maxlength="30" class="form-control">
              </div>

              <div class="form-group">
                   <label for="exampleFormControlSelect1">Şöbəni seç</label>
                    <select required name="user_department_detail" class="form-control form-control-lg">
<option value="<?php echo  $user_department_detail ?>"><?php echo  $user_department_detail ?></option>
<?php 
  $select_departments = "SELECT department_id , department_title FROM departments WHERE department_title!='$user_department_detail' ORDER BY department_id DESC";  
      $result = mysqli_query($connect, $select_departments);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $department_title = $row["department_title"];
      echo "<option value=\"$department_title\">$department_title</option>";}}
?>
                    </select>
             </div> 

                    <div class="form-group">
                      <label>İstifadəçinin Telefonu</label>
                          <input required class="form-control" 
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   type="number" 
                                   maxlength="12" 
                                   value="<?php echo $user_mobile;?>" 
                                   name="user_mobile" 
                                   placeholder="994500000000">
                    </div>


              <div class="form-group">
                   <label for="exampleFormControlSelect1">İstifadəçinin statusu</label>
                    <select required name="user_permission" class="form-control form-control-lg">
                  <?php 
                  if ($user_permission=="U") {
                    echo "
                    <option selected value=\"U\">İstifadəçi</option>
                    <option value=\"A\">Administrator</option>
                    <option value=\"GA\">Böyük Administrator</option>
                    ";
                  }
                  else if ($user_permission=="A") {
                    echo "
                    <option value=\"U\">İstifadəçi</option>
                    <option selected value=\"A\">Administrator</option>
                    <option value=\"GA\">Böyük Administrator</option>
                    ";
                  }
                  else if ($user_permission=="GA") {
                    echo "
                    <option value=\"U\">İstifadəçi</option>
                    <option value=\"A\">Administrator</option>
                    <option selected value=\"GA\">Böyük Administrator</option>
                    ";
                  }
                  ?> 
                    </select>
             </div>                     
        <button name="edit_user" type="submit" class="btn btn-primary mr-2">HESABI DÜZƏLT</button>
        <button name="delete_user" onclick="return confirm('Silmək istədiyini təsdiqləyirsən?');" type="submit" class="btn btn-danger">HESABI SİL</button>
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
