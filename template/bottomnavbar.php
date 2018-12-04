    <div class="nav-bottom">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a href="/dashboard/main" class="nav-link">
              	<i class="link-icon icon-home"></i>
              	<span class="menu-title">Əsas panel</span></a>
            </li>

            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
              	<i class="link-icon icon-book-open"></i>
              		<span class="menu-title">Problemlər</span><i class="menu-arrow"></i>
              	</a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item">
                  	<a class="nav-link" href="/dashboard/add-problem"><i class="icon-plus pr-3 text-dark"></i> Problem yarat</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/dashboard/my-problems"><i class="icon-layers pr-3 text-dark"></i> Mənim Problemlərim</a>
                  </li>                
    <?php if ($_SESSION['user_permission']=="A" || $_SESSION['user_permission']=="GA") {           
        echo "
            <li class=\"nav-item\">
              <a href=\"/dashboard/all-problems\" class=\"nav-link\">

                <span class=\"menu-title\"><i class=\"icon-loop pr-3 text-dark\"></i> Bütün problemlər</span></a>
            </li>";}?>  
                </ul>
              </div>
            </li>
  <?php if ($_SESSION['user_permission']=="A" || $_SESSION['user_permission']=="GA") {           
        echo "
            <li class=\"nav-item\">
              <a href=\"/dashboard/profiles\" class=\"nav-link\">
                <i class=\"link-icon icon-people\"></i>
                <span class=\"menu-title\">Profillər</span></a>
            </li>";}?>        
   <?php if ($_SESSION['user_permission']=="A" || $_SESSION['user_permission']=="GA") {           
        echo "
            <li class=\"nav-item\">
              <a href=\"/dashboard/notifications\" class=\"nav-link\">
                <i class=\"link-icon icon-bell\"></i>
                <span class=\"menu-title\">Bildirişlər</span></a>
            </li>";}?>                 
  <?php if ($_SESSION['user_permission']=="A" || $_SESSION['user_permission']=="GA") {           
        echo "
            <li class=\"nav-item\">                   
              <a href=\"javascript:void(0)\" class=\"nav-link\">
                <i class=\"link-icon icon-drawer\"></i>
                  <span class=\"menu-title\">Şöbələr</span><i class=\"menu-arrow\"></i>
                </a>  
              <div class=\"submenu\">
                <ul class=\"submenu-item\">                  
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/dashboard/add-department\"><i class=\"icon-plus pr-3 text-dark\"></i> Şöbə yarat</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/dashboard/departments\"><i class=\"icon-layers pr-3 text-dark\"></i> Şöbələr</a>
                  </li> 
                </ul>
              </div>
            </li> ";}?>
 
            <li class="nav-item">
              <a href="/dashboard/user" class="nav-link">
              	<i class="link-icon icon-user"></i>
              	<span class="menu-title">İstifadəçi</span></a>
            </li>
  
            <li class="nav-item">
              <a href="/dashboard/profile/settings" class="nav-link">
              	<i class="link-icon  icon-wrench"></i>
              	<span class="menu-title">Tənzimləmələr</span></a>
            </li>   
            <li class="nav-item">
              <a href="/dashboard/support" class="nav-link">
              	<i class="link-icon  icon-support"></i>
              	<span class="menu-title">Kömək</span></a>
            </li>                                 
          </ul>
        </div>
      </div>

