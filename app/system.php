<?php
require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";
if(!empty($_GET['process'])){

/*
*		Notification Fetcher
*/

	if($_GET['process']=="notf_fetch"){


		if(isset($_POST['view'])){
		$con = mysqli_connect("localhost", "emiga", "emiga", "emigaproject");


				if($_POST["view"] != ''){
    			$update_query = "UPDATE notf SET notf_status = 1 WHERE notf_status=0";
    			mysqli_query($con, $update_query);}

    	if (!empty($_GET['limit'])) {
    			$limit=$_GET['limit'];
    				if($_SESSION['user_permission']=="U"){
    				$query = "SELECT * FROM notf WHERE notf_permission=`U` ORDER BY notf_id DESC";
    				}
					else{$query = "SELECT * FROM notf ORDER BY notf_id DESC LIMIT $limit";}}	

    		else{    				
    			if($_SESSION['user_permission']=="U"){
    				$query = "SELECT * FROM notf WHERE notf_permission=`U` ORDER BY notf_id DESC";
    				}
					else{$query = "SELECT * FROM notf ORDER BY notf_id DESC LIMIT $limit";}}
    			
    				

			$result = mysqli_query($con, $query);
			$output = '';


				if(mysqli_num_rows($result) > 0){
 					while($row = mysqli_fetch_array($result)){

 						/*
 						*		Message
 						*/
   						$output .= '
                  <div class="preview-item">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-medium">'.$row["notf_subject"].'
                      </h6>
                      <p class="font-weight-normal small-text" style="opacity:0.5;width:300px;">
                        '.$row["notf_text"].'
                      </p>
                    </div>
                  </div>';

 					}
				}


			else{  
					/*
					*		  Message not found
					*/

				$output .= '
                  <div class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
            <h6 class="preview-subject ellipsis font-weight-medium">Heç bildiriş tapılmadı</h6>
                    </div>
                  </div>';
			}



				$status_query = "SELECT * FROM notf WHERE notf_status=0";
				$result_query = mysqli_query($con, $status_query);
				$count = mysqli_num_rows($result_query);	

					$data = array(
  							  'notification' => $output,
   							  'unseen_notification'  => $count
   							);

				echo json_encode($data);

		}

	}


/*
*    Notification Insert
*/

	else if ($_GET['process']=="notf_insert"){

		if(isset($_POST["subject"])){
		$con = mysqli_connect("localhost", "emiga", "emiga", "emigaproject");
	    $subject = mysqli_real_escape_string($con, strip_tags($_POST["subject"]));
        $comment = mysqli_real_escape_string($con, strip_tags($_POST["comment"]));
        $permission = mysqli_real_escape_string($con, strip_tags($_POST["user_permission"]));
        $query = " INSERT INTO notf(notf_subject, notf_text , notf_permission) VALUES ('$subject', '$comment' , '$permission')";
 		mysqli_query($con, $query);
		}

	}



/*
*   Process end
*/


}
/*
*   Process not found
*/
	else{die();}
?>	