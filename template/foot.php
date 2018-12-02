<script src="/<?php echo $_COOKIE['emigaUniqID'] ;?>-app.js"></script>
<?php 
if (!empty($_GET['route'])) {
	if (
		($_GET['route']=="departments") ||
		($_GET['route']=="my-problems") ||
		($_GET['route']=="all-problems")||
    ($_GET['route']=="support") ||
    ($_GET['route']=="user-profiles")
		){
	echo "<script type=\"text/javascript\" src=\"/static/pack/vendors/js/vendor.bundle.addons.js\"></script>";}
  if(
     ($_GET['route']=="support") 
    ){
    $ram=emigaServerMemory();
    $cpu=emigaServerCpu();
    echo "
    <script>
     var g5 = new JustGage({
    id: 'g5',
    value:$ram,
    min: 0,
    max: 100,
    symbol: '%',
    donut: true,
    pointer: true,
    gaugeWidthScale: 0.3,
    pointerOptions: {
      toplength: 10,
      bottomlength: 10,
      bottomwidth: 8,
      color: '#000'
    },
    customSectors: [{
      color: \"#ff0000\",
      lo: 50,
      hi: 100
    }, {
      color: \"#00ff00\",
      lo: 0,
      hi: 50
    }],
    counter: true
     });
    var g6 = new JustGage({
    id: 'g6',
    value:$cpu,
    min: 0,
    max: 3.00,
    symbol: 'GHz',
    donut: true,
    pointer: false,
    gaugeWidthScale: 0.4,
     });
     </script>
    ";
     }

}	



?>

<script type="text/javascript">
(function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
      "aLengthMenu": [
        [10, 20, 50, -1],
        [10, 20, 50, "Hamısı"]
      ],
      "iDisplayLength": 10,
      "language": {
        "url":"/static/datatable_az.json"
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
</script>
</body>
</html>