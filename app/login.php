<?php
  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";
  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/head.php";

  /*Process Login*/
  if(isset($_POST['login'])){     
    $user_email    = mysqli_real_escape_string($connect, strtolower($_POST["email"])); 
    $user_password = mysqli_real_escape_string($connect, md5($_POST["password"]));
 
    
  $login ="SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password' LIMIT 1";
  $result = mysqli_query($connect, $login);  

    if(mysqli_num_rows($result) > 0)  {

    while($row = mysqli_fetch_array($result)){
    $u_id   = $row['user_id'];
    $ip     = emigaIpDetector();
    $token  = emigaToken();
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    $update_user =" UPDATE users SET user_agent='$user_agent' , ip='$ip' , token='$token'  WHERE user_id='$u_id' "; 
    $result_update_user = mysqli_query($connect, $update_user);

    session_start();  
    session_regenerate_id(true); 

    /*Collect Data*/
    $_SESSION['user_id']            = $row['user_id']; 
    $_SESSION['user_name']          = $row['user_name']; 
    $_SESSION['user_email']         = $row['user_email']; 
    $_SESSION['user_lastname']      = $row['user_lastname']; 
    $_SESSION['user_permission']    = $row['user_permission']; 
    $_SESSION['user_department_detail'] = $row['user_department_detail']; 
    $_SESSION['reg_date']           = $row['reg_date']; 
    $_SESSION['last_logged']        = $row['last_logged']; 
    $_SESSION['ip']                 = $ip;
    $_SESSION['token']              = $token;
    $_SESSION['user_agent']         = $user_agent; 
    $_SESSION['emiga_logged_verify']= TRUE;

    setcookie("emigaUniqID", $token , time() + (86400 * 7), "/");

    /*Go*/
    header("Location: /dashboard/main"); 
    exit;}//end $result while
    }//end $result if
 
  else{echo"<script>window.location.href = \"/login?action=wrong_information\";</script>";} 
  }//End Post login

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
                  <h4 class="card-title"><i class="icon-pin"></i> YENİLƏNMƏLƏR</h4>
                  <ul class="bullet-line-list">

                    <li>
                      <h6>v1.0.0</h6>
                      <p class="mb-0">Yeni versiyaya yeniləndi.Vizual görünüş və 
                      bəzi problemlər həll edildi</p>
                      <p class="text-muted">
                        <i class="icon-clock"></i>
                        7 dəqiqə əvvəl
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
                <p></i>Hesabın Yoxdur ?</p>
                <a class="btn get-started-btn" href="/register">Qeydiyyatdan Keç</a>
              </div>
              <!-- End Register -->
              <form method="POST">
               <?php 
                  if (empty($_GET['action'])) {
                  echo "
                        <h3 class=\"mr-auto\">Salam! gəl başlayaq</h3>
                        <p class=\"mb-5 mr-auto\">Daxil olmaq üçün bütün xanaları doldur.</p>";}
                  else{
                    if($_GET['action']=="wrong_information"){
                    echo "
                        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-question\"></i></strong>Daxil etdiyiniz şifrə və ya email səhvdir.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                        </div>";}
                    else if($_GET['action']=="logged_out"){
                    echo  "
                        <h3 class=\"mr-auto\">Çıxış edildi</h3>
                        <p class=\"mb-5 mr-auto\">yenidən daxil olmaq üçün xanaları doldurun.</p>";}   
                      else{                  
                        echo "
                        <h3 class=\"mr-auto\">Salam! gəl başlayaq</h3>
                        <p class=\"mb-5 mr-auto\">Daxil olmaq üçün bütün xanaları doldur.</p>";}
                      }  
                ?>  
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-user"></i></span>
                    </div>
                    <input required type="email" name="email" class="form-control" placeholder="Emailini daxil et">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-lock"></i></span>
                    </div>
                    <input required type="password" name="password" class="form-control" placeholder="Şifrəni daxil et">
                  </div>
                </div>

                <div class="form-group">
                  <button name="login" class="btn btn-primary submit-btn">DAXİL OL</button>
                </div>


                <!-- Mini Area for Copyright -->
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
<?php
  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/foot.php";
?>