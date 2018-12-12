</emiga::app>
<script src="/static/app.js"></script>
<?php 
if (!empty($_GET['route'])) {
  if (($_GET['route']=="departments") || ($_GET['route']=="my-problems") || ($_GET['route']=="all-problems")|| ($_GET['route']=="support") ||($_GET['route']=="profiles") || ($_GET['route']=="notifications") || ($_GET['route']=="edit-notification") || ($_GET['route']=="deleted-problems") || ($_GET['route']=="my-tasks")){
echo "<script type=\"text/javascript\" src=\"/static/pack/data-table.js\"></script>
<script type=\"text/javascript\">
(function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
      \"aLengthMenu\": [
        [10, 20, 50, -1],
        [10, 20, 50, \"Hamısı\"]
      ],
      \"iDisplayLength\": 10,
      \"language\": {
        \"url\":\"/static/datatable_az.json\"
      }
    });
    $('#order-listing').each(function() {
      var datatable = $(this);
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);
</script>";}
require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/notifications.php";}

 if((!empty($_GET['route'])) && ($_GET['route']=="edit-problem")){
    if ( 
           ($problem_status!="P" && $_SESSION['user_permission']=="U")
        || 
           ($_SESSION['user_permission']=="A")
       ){
            if($problem_status=="C"){$problem_css="danger";$problem_status="Ləğv edildi";}
            else if($problem_status=="V"){$problem_css="warning";$problem_status="Görüldü";}
            else if($problem_status=="D"){$problem_css="success";$problem_status="Həll edildi";}
            else{$problem_css="info";$problem_status="Gözləmədə";}
      echo "
      <script type=\"text/javascript\">
      $( document ).ready(function() {
          $(\"#check\").prop('disabled', true);
          $(\"#check2\").prop('disabled', true);
          $(\"input\").prop('disabled', true);
          $(\"textarea\").prop('disabled', true);
          $(\"#welcome\").html(\"Admin tərəfindən cavab gəldiyinə (və ya problemin statusunun dəyişildiyinə) görə problemi düzəltmək artıq mümkün deyil.\");
          $(\"#title\").html(\"<b>Problem #$problem_id</b>\");
          $(\"#buttons\").html(\" \");
          $(`#admin_response`).html(`
                  <ul class=\"bullet-line-list\">
                      <h4 class=\"mb-4\"></h4>
                      <p class=\"mb-2\">Status : <label class=\"badge badge-$problem_css\"><b>$problem_status</b></label></p>
                    <li>
                      <h6>İnzibatçı :</h6>
                      <p class=\"mb-2\">$problem_admin</p>
                    </li>
                    <li>
                      <h6>Yönləndirilən şəxs :</h6>
                      <p class=\"mb-2\">$user_worker</p>
                    </li>                    
                    <li>
                      <h6>Açıqlama :</h6>
                      <p class=\"mb-2\">$problem_status_description</p>
                    </li>                                                     
                  </ul>`)


      });
      </script>  
      ";
    }
    if($_SESSION['user_permission']=="A"){
      echo"
      <script type=\"text/javascript\">
      $( document ).ready(function() {
          $(\"#reg_date\").prop('disabled', true);
      });
      </script>
      ";

    }
  } 
?>
<script type="text/javascript">
$( document ).ready(function() {  
$("#print").click(function(){
window.print();
});  
function optimize(){
$('#no-js').removeClass("no-js");
$('#loader').addClass("no-js");
}
setTimeout(optimize, 1500);
});
</script>
</body>
</html>