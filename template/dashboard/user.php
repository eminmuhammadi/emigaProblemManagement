<?php
      if ($_SESSION['user_permission']=="U")  {$status="İstifadəçi";}
      if ($_SESSION['user_permission']=="GA") {$status="Böyük Administrator";}
      if ($_SESSION['user_permission']=="A")  {$status="Administrator";}
?>
<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!--  --------------- -->
<div class="col-md-12 grid-margin stretch-card">
              <div class="card bg-white card-update">
                <div class="card-body">
                  <div class="d-flex border-light-white pb-4 update-item">
                    <div class="img-lg rounded-circle img-bordered mr-4 bg-dark"/></div>
                    <div>
            <h1 class="font-weight-medium d-flex"><?php echo $_SESSION['user_name']." ".$_SESSION['user_lastname'];?>
                      </h1>
                      <h4><?php echo $status?></h4>
          <table class="mb-5 mt-5 table table-responsive">
                      <tbody>
                        <tr>
                          <td>Email :</td>
                          <td><?php echo $_SESSION['user_email'];?></td>                          
                        </tr>
                        <tr>
                          <td>İstifadəçinin şöbəsi :</td>
                          <td><?php echo $_SESSION['user_department_detail'];?></td>                          
                        </tr> 
                        <tr>
                          <td>Qeydiyyat tarixi :</td>
                          <td><?php echo $_SESSION['reg_date'];?></td>                          
                        </tr>                                                             
                        <tr>
                          <td>Əvvəl daxil olduğun tarix :</td>
                          <td><?php echo $_SESSION['last_logged'];?></td>                          
                        </tr>     
                         <tr>
                          <td>İP :</td>
                          <td><?php echo $_SESSION['ip'];?></td>                          
                        </tr>
                         <tr>
                          <td>Cihaz :</td>
                          <td><?php echo $_SESSION['user_agent'];?></td>                          
                        </tr>                        
                      </tbody>
                  </table>
    <p class="text-dark"><i class="icon-note"></i> Verilənlərdə dəyişiklik edilən zaman problem yaranarsa <a href="/logout">çıxış edin</a></p>                  
                    </div>
                  </div>      
                </div>
             </div>   
</div>                   


<!-- Start Template -->
          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->    
<!--  --------------- -->
