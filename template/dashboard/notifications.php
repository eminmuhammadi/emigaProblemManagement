<!-- Start Template -->
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!--  --------------- -->
      <div class="col-md-8">
          <div class="card">
            <div class="card-body">
<?php
  if(!empty($_GET['action'])){
     if($_GET['action']=="notification-deleted"){
        echo "                       
        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                          <strong><i class=\"icon-note\"></i></strong> Bildiriş uğurlu bir şəkildə silindi.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Bağla\">
                          <span aria-hidden=\"true\">&times;</span>
                             </button>
                </div>";
      }}
?>              
              <h4 class="card-title"><b>Bildirişlər (ÜNVANLANMAMIŞ)</b></h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>Bildirişin başlığı</th>
                          <th>Bildirişin açıqlaması</th>
                      </tr>
                    </thead>
                    <tbody>
<?php 
      $select_notf ="SELECT notf_id , notf_text , notf_subject ,notf_permission FROM notf WHERE user_id IS NULL ORDER BY notf_id DESC ";  
      $result = mysqli_query($connect, $select_notf);  

      if(mysqli_num_rows($result) > 0)  {  
      while($row = mysqli_fetch_array($result)) { 
      $notf_text=$row["notf_text"];
      $notf_subject=$row["notf_subject"];
      $notf_permission=$row["notf_permission"];
      $notf_id=$row["notf_id"];
      echo "
                      <tr>
                          <td><a href=\"/dashboard/edit-notification&notf_id=$notf_id\">$notf_text</a></td>
                          <td>$notf_subject</td>                          
                      </tr>
      ";}}
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

      </div> 


      <div class="col-md-4">
   <form class="form-sample" method="post" id="comment_form">
    <div class="form-group">
     <label>Bildirişin başlığı</label>
     <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <div class="form-group">
    <select class="form-control" id="user_permission" name="user_permission">
        
        <option value="U">İstifadəçi</option>  
        <option value="A">Administrator</option>  
        <option value="GA">Böyük Administrator</option>  

    </select>
    </div>
    <div class="form-group">
     <label>Bildiriş</label>
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info" value="YAZ" />
    </div>
   </form>

      </div>  

<!-- Start Template -->
          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->    
<!--  --------------- -->