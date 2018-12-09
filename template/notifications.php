<script type="text/javascript">
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"/system?process=notf_fetch&limit=10",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.notification').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 <?php if (($_SESSION['user_permission']=="GA") || ($_SESSION['user_permission']=="A")){
  echo " $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:\"/system?process=notf_insert\",
    method:\"POST\",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert(\"Bütün xanalar vacibdir\");
  }
 });"; }?>
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>