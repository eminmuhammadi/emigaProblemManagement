<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">


      <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><b>Bildirişlər</b></h4>
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
      $select_notf ="SELECT notf_id , notf_text , notf_subject ,notf_permission FROM notf ORDER BY notf_id DESC";  
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
<?php
if(!empty($_GET['notf_id'])){
/*
*   Get Notification Information
*/
$notf_id = $_GET['notf_id'];
$get_notf_inf ="SELECT notf_id , notf_text , notf_subject , notf_permission FROM notf WHERE notf_id='$notf_id' ";  
$result_notf_inf = mysqli_query($connect, $get_notf_inf);  
    if(mysqli_num_rows($result_notf_inf) > 0){  
      while($row = mysqli_fetch_array($result_notf_inf)){ 
        $notf_id=$row["notf_id"];
        $notf_text=$row["notf_text"];
        $notf_subject=$row["notf_subject"];
        $notf_permission=$row["notf_permission"];
      }}
           else {die("Heç bir bildiriş tapılmadı.");}
/*
*  Delete Notification  
*/
if(isset($_POST["delete_notf"])){       
  $delete_notf ="DELETE FROM notf WHERE notf_id='$notf_id' ";  
  $result_delete_notf = mysqli_query($connect, $delete_notf);
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];
  header("Location: /dashboard/notifications&action=notification-deleted&id=$id&d=$d");} 
/*
*  Edit Department
*/
if(isset($_POST["edit_notf"]))  { 
  $notf_text=mysqli_real_escape_string($connect, $_POST["notf_text"]);
  $notf_subject=mysqli_real_escape_string($connect, $_POST["notf_subject"]);
  $notf_permission=mysqli_real_escape_string($connect, $_POST["notf_permission"]);  
  
  $update_department =" UPDATE notf SET notf_permission='$notf_permission' , notf_subject='$notf_subject' , notf_text='$notf_text' WHERE notf_id='$notf_id' "; 
  $result_department_inf = mysqli_query($connect, $update_department);
            $d=$_SERVER['HTTP_USER_AGENT'];
           $id=$_COOKIE['emigaUniqID'];
    header("Location: /dashboard/edit-notification&notf_id=$notf_id&id=$id&d=$d");}}//end empty
else{die("Heç bir bildiriş seçilmədi.");}
?>

      <div class="col-md-4">
   <form class="form-sample" method="post">
    <div class="form-group">
     <label>Bildirişin başlığı</label>
     <input  required value="<?php echo $notf_subject;?>" type="text" name="notf_subject" class="form-control">
    </div>
    <div class="form-group">
    <select class="form-control"id="edit_notf" name="notf_permission">
        
                  <?php 
                  if ($notf_permission=="U") {
                    echo "
                    <option selected value=\"U\">İstifadəçi</option>
                    <option value=\"A\">Administratort</option>
                    <option value=\"GA\">Böyük Administrator</option>
                    ";
                  }
                  else if ($notf_permission=="A") {
                    echo "
                    <option value=\"U\">İstifadəçi</option>
                    <option selected value=\"A\">Administrator</option>
                    <option value=\"GA\">Böyük Administrator</option>
                    ";
                  }
                  else if ($notf_permission=="GA") {
                    echo "
                    <option value=\"U\">İstifadəçi</option>
                    <option value=\"A\">Administratort</option>
                    <option selected value=\"GA\">Böyük Administrator</option>
                    ";
                  }
                  ?> 

    </select>
    </div>
    <div class="form-group">
     <label>Bildiriş</label>
     <textarea name="notf_text" required class="form-control" rows="5"><?php echo $notf_text;?></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="edit_notf" class="btn btn-info" value="DÜZƏLT" />
     <input type="submit" name="delete_notf" class="btn btn-danger" value="SİL" />
    </div>
   </form>

      </div>  


          </div> <!-- Row --> 
        </div><!-- Content Wrapper -->
      </div><!-- Main Panel -->    
  </div> <!-- Container -->    