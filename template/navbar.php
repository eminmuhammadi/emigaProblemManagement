<div class="container-scroller">
 <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="nav-top flex-grow-1">
        <div class="container d-flex flex-row h-100 align-items-center">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center">

            <a class="navbar-brand brand-logo" href="/dashboard/main" style="color:#fff;border-bottom:2px solid #f9f9f9;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                  <b>AzMIU  &mdash; İKT Mərkəzi</b>
            </a>

            <a class="navbar-brand brand-logo-mini" href="/dashboard/main" style="color:#fff;border-bottom:2px solid #f9f9f9;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                   <b>AzMIU  &mdash; İKTM</b>
            </a>

          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between flex-grow-1"> 
            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">


              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="icon-bell mx-0"></i>
                  <span class="count bg-danger text-white mb-2" style="font-size:12px;width:12px;height:12px;"></span>
                </a> 
                <div class="pt-3 dropdown-menu notification dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                </div>
              </li>

              <!-- User Settings -->           
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <i class="icon-user" style="font-weight:900;font-size:22px;"></i>
                  <span class="nav-profile-name"><?php echo $_SESSION['user_name']." ".$_SESSION['user_lastname'];?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a href="/dashboard/profile/settings" class="dropdown-item">
                    <i class="icon-settings text-primary mr-2"></i>
                    Tənzimləmələr
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/logout">
                    <i class="icon-logout text-primary mr-2"></i>
                    Çıxış et
                  </a>
                </div>
              </li>
              
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu" style="color:white;margin-right:8px;"></span>
            </button>
            </ul>
          </div>
        </div>
      </div>
      <?php  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/bottomnavbar.php"; ?>
    </nav>