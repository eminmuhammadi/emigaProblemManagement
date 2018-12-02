<script src="/<?php echo $_COOKIE['emigaUniqID'] ;?>-app.js"></script>
<?php 
if (!empty($_GET['route'])) {
  if (($_GET['route']=="departments") || ($_GET['route']=="my-problems") || ($_GET['route']=="all-problems")|| ($_GET['route']=="support") ||($_GET['route']=="profiles")){
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
</script>";}}
?>
</body>
</html>