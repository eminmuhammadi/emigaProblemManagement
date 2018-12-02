<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!--  --------------- -->
            <div class="box col-lg-3">
                <div class="card">
                	<div class="card-body">
                		<div class="card-title"><h4>RAM (<small>maks. 100%</small>)</h4></div>
                      	<div id="g5" class="gauge"></div>
                    </div>
                </div>
            </div>
            <div class="box col-lg-3">
                <div class="card">
                	<div class="card-body">
                		<div class="card-title"><h4>CPU (<small>3 GHz</small>)</h4></div>                	
                      	<div id="g6" class="gauge"></div>
                    </div>
                </div>
            </div>
            <div class="box col-lg-6">
					<div class="row">

<?php 
      $select_GA_users ="SELECT  user_name , user_lastname , user_email , user_permission FROM users WHERE user_permission='GA' ";  
      $result = mysqli_query($connect, $select_GA_users);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $user_name        = $row["user_name"];
      $user_lastname    = $row["user_lastname"];
      $user_email       = $row["user_email"];
      $user_permission	= $row["user_permission"];
      echo "
						<div class=\"col-md-12 grid-margin stretch-card\">
							<div class=\"card\">
								<div class=\"card-body\">
									<div class=\"d-flex flex-row\">
										<img src=\"https://via.placeholder.com/92x92\" class=\"img-lg rounded\" alt=\"profile image\"/>
										<div class=\"ml-3\">
											<h6>$user_name $user_lastname</h6>
											<p class=\"text-muted\">$user_email</p>
											<p class=\"mt-2 text-success font-weight-bold\">Böyük Administrator</p>
										</div>
									</div>
								</div>
							</div>
						</div>                   
      ";}}
      $select_A_users ="SELECT  user_name , user_lastname , user_email , user_permission FROM users WHERE user_permission='A' ";  
      $result = mysqli_query($connect, $select_A_users);  
      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) {
      $user_name        = $row["user_name"];
      $user_lastname    = $row["user_lastname"];
      $user_email       = $row["user_email"];
      $user_permission	= $row["user_permission"];
      echo "
						<div class=\"col-md-12 grid-margin stretch-card\">
							<div class=\"card\">
								<div class=\"card-body\">
									<div class=\"d-flex flex-row\">
										<img src=\"https://via.placeholder.com/92x92\" class=\"img-lg rounded\" alt=\"profile image\"/>
										<div class=\"ml-3\">
											<h6>$user_name $user_lastname</h6>
											<p class=\"text-muted\">$user_email</p>
											<p class=\"mt-2 text-success font-weight-bold\">Administrator</p>
										</div>
									</div>
								</div>
							</div>
						</div>                   
      ";}}      
?>





				
				</div>                     
            </div>


<!-- Start Template -->
          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->    
<!--  --------------- -->