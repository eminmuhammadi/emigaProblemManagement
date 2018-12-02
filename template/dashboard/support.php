<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!--  --------------- -->
            <div class="box col-lg-6">
                <div class="card">
                	<div class="card-body">
              <div class="row">      
               <div class="col-lg-12">     
                <h4 class="card-title mb-0">RAM</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                      <div class="d-md-flex">
                        <h2 class="mb-0"><?php echo emigaServerMemory();?>%</h2>
                      </div>
                      <small class="text-gray">maksimum 100%.</small>
                    </div>
                    <div class="d-inline-block">
                      <div class="<?php
                      $ram=emigaServerMemory();
                      if($ram<"50"){
                        echo"bg-success";
                      }
                      if(($ram>"51") && ($ram<"69")){
                        echo"bg-warning";
                      }
                      if($ram>"70"){
                        echo"bg-danger";
                      }
                      ?> px-4 py-2 rounded">
                        <i class="icon-speedometer text-white icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>


               <div class="col-lg-12 mt-5">     
                <h4 class="card-title mb-0">CPU</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                      <div class="d-md-flex">
                        <h2 class="mb-0"><?php echo emigaServerCpu();?> GHz</h2>
                      </div>
                    </div>
                    <div class="d-inline-block">
                      <div class="<?php
                      $cpu=emigaServerCPU();
                      if($cpu<"0.5"){
                        echo"bg-success";
                      }
                      if(($cpu>"0.51") && ($cpu<"1")){
                        echo"bg-warning";
                      }
                      if($cpu>"1.01"){
                        echo"bg-danger";
                      }
                      ?> px-4 py-2 rounded">
                        <i class="icon-speedometer text-white icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>    
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