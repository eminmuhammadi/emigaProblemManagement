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
    
    $update_user =" UPDATE users SET user_agent='$user_agent' , ip='$ip' , token='$token' , verified='1' WHERE user_id='$u_id' "; 
    $result_update_user = mysqli_query($connect, $update_user);

    session_start();

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
    $_SESSION['user_mobile']        = $row['user_mobile']; 
    $_SESSION['user_phone']         = $row['user_phone']; 
    $_SESSION['verified']           = $row['verified'];     
    $_SESSION['emiga_logged_verify']= TRUE;

    setcookie("emigaUniqID", $token , time() + (86400 * 7), "/");
    $d=$_SERVER['HTTP_USER_AGENT'];
    $id=$_COOKIE['emigaUniqID'];

    /*Go*/
    header("Location: /dashboard/main&id=$id&d=$d"); 
    exit;}//end $result while
    }//end $result if


  else{
      $d=$_SERVER['HTTP_USER_AGENT'];
      $id=$_COOKIE['emigaUniqID'];
     header("Location: /login?action=wrong_information&id=$id&d=$d");
  } 
  }//End Post login

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/az_AZ/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper auth p-0 theme-two">
        <div class="row d-flex align-items-stretch">

          <!-- IMG -->
          <div class="col-md-4 bg-blue banner-section d-none d-md-flex align-items-stretch justify-content-center">

            <div class="card fixed-left">
                <div class="card-body">
                  <img class="card-title" src="/static/welcome.png" style="width:75%;" alt="AzMIU">
                    <div class="fb-page col-lg-12" 
                         data-href="https://www.facebook.com/azmiuikt/" 
                         data-tabs="messages,timeline,events" 
                         data-small-header="false"
                         data-adapt-container-width="true" 
                         data-hide-cover="false" data-show-facepile="true">
                              <blockquote cite="https://www.facebook.com/azmiuikt/" class="fb-xfbml-parse-ignore">
                               <a href="https://www.facebook.com/azmiuikt/">AzMİU İKT Mərkəzi</a>
                             </blockquote>
                    </div>
                  </div>
                </div>  
              </div>
          <!-- End  IMG-->


          <!-- Login Form -->
          <div class="col-12 col-md-8 h-100 bg-blue-svg">
            <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">

              <!-- Register -->
              <div class="nav-get-started text-white">
                <p></i><b>Hesabın Yoxdur ?</b></p>
                <a class="btn get-started-btn text-white" href="/register">Qeydiyyatdan Keç</a>
              </div>
              <!-- End Register -->
              <form method="POST" class="text-white">
               <?php 
                  if (empty($_GET['action'])) {
                  echo "
                        <h3 class=\"mr-auto text-white\">Salam gəl başlayaq</h3>
                        <p class=\"mb-5 mr-auto text-white\">Daxil olmaq üçün bütün xanaları doldur.</p>";}
                  else{
                    if($_GET['action']=="wrong_information"){
                    echo "
                        <div class=\"alert alert-info alert-dismissible fade show text-white\" role=\"alert\">
                          <strong><i class=\"icon-question\"></i></strong>Daxil etdiyiniz şifrə və ya email səhvdir.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                        </div>";}
                    else if($_GET['action']=="logged_out"){
                    echo  "
                        <h3 class=\"mr-auto text-white\">Çıxış edildi</h3>
                        <p class=\"mb-5 mr-auto text-white\">yenidən daxil olmaq üçün xanaları doldurun.</p>";}   
                      else{                  
                        echo "
                        <h3 class=\"mr-auto text-white\">Salam! gəl başlayaq</h3>
                        <p class=\"mb-5 mr-auto text-white\">Daxil olmaq üçün bütün xanaları doldur.</p>";}
                      }  
                ?>  
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark"><i class="icon-user"></i></span>
                    </div>
                    <input required type="email" id="email" name="email" class="form-control" placeholder="Emailini daxil et">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark"><i class="icon-lock"></i></span>
                    </div>
                    <input autocomplete="off" required type="password" id="password" name="password" class="text-dark form-control" placeholder="Şifrəni daxil et">
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
<?php require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/foot.php";?>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#email').focus();});
    window.onload = function() {
    const password = document.getElementById('password');
    password.onpaste = function(e) {
    e.preventDefault();}}
    </script>