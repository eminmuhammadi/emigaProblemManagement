<?php

  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";
  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/head.php";

  /*Process Login*/
  if(isset($_POST['register'])){ 

    $first_name = mysqli_real_escape_string($connect, $_POST["fname"]);
    $last_name = mysqli_real_escape_string($connect, $_POST["lname"]);
    $email = mysqli_real_escape_string($connect, $_POST["email"]); 
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $password=md5($password);


    /* Search email */
    $login ="SELECT * FROM users WHERE user_email='$email' LIMIT 1";
    $login_result = mysqli_query($connect, $login); 


    if(mysqli_num_rows($login_result) > 0)  {
    echo"<script>window.location.href = \"/register?action=wrong_email\";</script>";
    }//end if search emai;

    else {
    $register="INSERT INTO users (user_name , user_lastname , user_email , user_password) VALUES ('".$first_name."' , '".$last_name."' , '".$email."' , '".$password."' )";

    if (mysqli_query($connect, $register)){header("Location: /login");exit();}
    }//end else
   }//End Register Area

?>
<style type="text/css">
.input-group-prepend{border-top-left-radius:6px;border-bottom-left-radius:6px;} 
.bg-blue-svg{background-color: #c5f1f9;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='696' height='696' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23c7d2e8' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23c7d2e8'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
background-size: auto auto;}
.bg-blue{background-color: #c5f1f9;}
</style>
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
                    <input minlength="4" maxlength="30" required type="text" name="fname" class="form-control" placeholder="Adını daxil et">
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
                    <input maxlength="32" minlength="6" required type="password" name="password" class="form-control" placeholder="Şifrəni daxil et">
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