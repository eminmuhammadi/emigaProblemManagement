<?php

  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";
  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/head.php";

  /*Process Login*/
  if(isset($_POST['register'])){ 

    $first_name = mysqli_real_escape_string($connect, $_POST["fname"]);
    $last_name = mysqli_real_escape_string($connect, $_POST["lname"]);
    $email = mysqli_real_escape_string($connect, strtolower($_POST["email"])); 
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $password=md5($password);


    /* Search email */
    $login ="SELECT * FROM users WHERE user_email='$email' LIMIT 1";
    $login_result = mysqli_query($connect, $login); 


    if(mysqli_num_rows($login_result) > 0)  {
    header("Location: /register?action=wrong_email");
    }//end if search emai;

    else {
    $register="INSERT INTO users (user_name , user_lastname , user_email , user_password) VALUES ('".$first_name."' , '".$last_name."' , '".$email."' , '".$password."' )";

    if (mysqli_query($connect, $register)){header("Location: /login");exit();}
    }//end else
   }//End Register Area

?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper auth p-0 theme-two">
        <div class="row d-flex align-items-stretch">

          <!-- IMG -->
          <div class="col-md-4 bg-blue banner-section d-none d-md-flex align-items-stretch justify-content-center">

            <div class="card fixed-left">
                <div class="card-body">
                  <h4 class="card-title"><i class="icon-pin"></i> QAYDALAR</h4>
                  <ul class="bullet-line-list">

                    <li>
                      <h6>Ad və SoyAdın daxil edilməsi</h6>
                      <p class="mb-0">ad və soyad ayrılıqda hər biri minimum 4 simvoldan ibarət olmalıdır.</p>
                      <p class="text-muted">
                        <i class="icon-check"></i>
                        Maksimum 30 simvol təyin edilmişdir
                      </p>
                    </li>
                    <li>
                      <h6>Emailin daxil edilməsi</h6>
                      <p class="mb-0">email unikal olub yalnız bir dəfə istifadə edilə bilinər.</p>
                      <p class="text-muted">
                        <i class="icon-check"></i>
                        Əsas tənzimlənmələrdə emailin təsdiqlənməsi vacibdir
                      </p>
                    </li>
                    <li>
                      <h6>Şifrənin daxil edilməsi</h6>
                      <p class="mb-0">Şifrə minimum 6 simvoldan ibarətdir və heç bir məhdudiyyət yoxdur.</p>
                      <p class="text-muted">
                        <i class="icon-check"></i>
                        Maksimum 32 simvol təyin edilmişdir
                      </p>
                    </li>

                  </ul>
                </div>
              </div>  

          </div>
          <!-- End  IMG-->


          <!-- Login Form -->
          <div class="col-12 col-md-8 h-100 bg-blue-svg">
            <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">

              <!-- Register -->
              <div class="nav-get-started">
                <p></i>Artıq Hesabın var?</p>
                <a class="btn get-started-btn" href="/login">Daxil Ol</a>
              </div>
              <!-- End Register -->
              <form method="POST"> 
               <?php 
                  if (empty($_GET['action'])) {
                  echo "
                        <h3 class=\"mr-auto\">Qeydiyyatdan keçmək üçün</h3>
                        <p class=\"mb-3 mr-auto\">aşağıdakı xanaları doldurun.</p>";}
                  else{

                    if ($_GET['action']=="wrong_email") {
                      echo "
                        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-question\"></i></strong>Qeyd etdiyiniz email artıq istifadə
                          olunmuşdur.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                        </div>";}
                      else{
                        echo "
                        <h3 class=\"mr-auto\">Qeydiyyatdan keçmək üçün</h3>
                        <p class=\"mb-3 mr-auto\">aşağıdakı xanaları doldurun.</p>";}
                      }
                ?> 
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-plus"></i></span>
                    </div>
                    <input id="name" minlength="4" maxlength="30" required type="text" name="fname" class="form-control" placeholder="Adını daxil et">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-plus"></i></span>
                    </div>
                    <input minlength="4" maxlength="30" required type="text" name="lname" class="form-control" placeholder="Soy adını daxil et">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-user"></i></span>
                    </div>
                    <input required type="email" name="email" class="form-control" placeholder="Emaili daxil edin">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-lock"></i></span>
                    </div>
                    <input autocomplete="off" maxlength="32" minlength="6" required type="password" name="password" class="form-control" id="password" placeholder="Şifrəni daxil et">
                  </div>
                </div>                
                <div class="form-group">
                  <button name="register" class="btn btn-primary submit-btn">QEYDİYYATDAN KEÇ</button>
                </div>
              <!-- Mini Copyright Area -->  
        <?php require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/mini_copyright.php"; ?>
              </form>
            </div>
          </div>
          <!-- End Login Form -->


        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<?php require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/foot.php"; ?>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#name').focus();});
    window.onload = function() {
    const password = document.getElementById('password');
    password.onpaste = function(e) {
    e.preventDefault();}}
    </script>