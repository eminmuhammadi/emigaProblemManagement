<?php
      function emigaDateFormatter($date,$f="0"){
            if($f=="0"){$date=date("d/m/Y", strtotime($date));}
            else if($f=="1"){$date=date("d/m/Y h:i", strtotime($date));}  
            else if($f=="setvalue"){$date=date("Y-m-d", strtotime($date));}
            return $date;    
      }
?>
