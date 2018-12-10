<?php
    $dep=$_SESSION["user_department_detail"];
    /*Total Charts Statics*/
  
    $total_p = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='P' && department_detail='$dep' ");
    $total_p = mysqli_num_rows($total_p);

    $total_d = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='D' && department_detail='$dep'");
    $total_d = mysqli_num_rows($total_d);

    $total_c = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='C' && department_detail='$dep'");
    $total_c = mysqli_num_rows($total_c);

    $total_v = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='V' && department_detail='$dep'");
    $total_v = mysqli_num_rows($total_v);


    /*Today Charts Statics*/

    $today_p = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='P' && (reg_date > CURDATE() || reg_date = CURDATE()) && department_detail='$dep' ");
    $today_p = mysqli_num_rows($today_p);

    $today_d = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='D' && (reg_date > CURDATE() || reg_date = CURDATE()) && department_detail='$dep' ");
    $today_d = mysqli_num_rows($today_d);

    $today_c = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='C' && (reg_date > CURDATE() || reg_date = CURDATE()) && department_detail='$dep' ");
    $today_c = mysqli_num_rows($today_c);

    $today_v = mysqli_query($connect,"SELECT problem_id FROM posts WHERE problem_status='V' && (reg_date > CURDATE() || reg_date = CURDATE()) && department_detail='$dep' ");
    $today_v = mysqli_num_rows($today_v);


    /* All Statics Compare*/

    $all_problems = mysqli_query($connect,"SELECT problem_id FROM posts WHERE department_detail='$dep' ");
    $all_problems = mysqli_num_rows($all_problems);

    $all_problems_today = mysqli_query($connect,"SELECT problem_id FROM posts WHERE (reg_date > CURDATE() || reg_date = CURDATE()) && department_detail='$dep'");
    $all_problems_today = mysqli_num_rows($all_problems_today);

    $all_problems_month = mysqli_query($connect,"SELECT problem_id FROM posts WHERE ((reg_date > curdate() - interval 30 day)||(reg_date > curdate() - interval 30 day)) && department_detail='$dep'");
    $all_problems_month = mysqli_num_rows($all_problems_month);

    $all_users = mysqli_query($connect,"SELECT user_id FROM users WHERE user_department_detail='$dep'");
    $all_users = mysqli_num_rows($all_users);


function emigaStats($stats){
    if(empty($stats)){return 0;}else{return $stats;}
}


function emigaCalculateTrend($stats,$selected_stats){

    if ($stats!=0){
        $calculate=($selected_stats/$stats)*100;
        $calculate=ceil($calculate);

    }

    else{$calculate="NAN";}


    return $calculate;
}

?>
<div class="col-md-12 grid-margin">

    <div class="row">
            <div class="col-6 col-md-6 col-lg-8">
                <h5>Salam 👋 <b>
                    <?php echo $_SESSION['user_name']." ".$_SESSION['user_lastname'];?></b>.Problemin var ?
                </h5>
            </div>

            <div class="col-6 col-md-6 col-lg-4">
                <button onclick="window.location.href = '/dashboard/add-problem';" class="btn btn-dark text-white form-control"><b><i class="icon-plus"></i>PROBLEMINI YAZ</b></button>
            </div>
  
    <div class="col-12 grid-margin pt-2"><i class="icon-alert"> </i> Statistika <b><mark><?php echo $_SESSION['user_department_detail']?></mark></b> şöbəsi üçün seçilmişdir.</div>        
    </div>


</div>


    <div class="col-12 grid-margin">
        <div class="card card-statistics">
             <div class="card-body p-0">

                  <div class="row">

                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1><?php echo emigaStats($all_problems);?></h1>
                          <p class="text-muted mb-0">Yazılan Problemlər</p>
                        </div>
                        <i class="icon-layers text-primary icon-lg"></i>
                      </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1><?php echo emigaStats($all_users);?></h1>
                          <p class="text-muted mb-0">Bütün administratorlar</p>
                        </div>
                        <i class="icon-people text-primary icon-lg"></i>
                      </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>+<?php echo emigaCalculateTrend($all_problems,$all_problems_today);?>%</h1>
                          <p class="text-muted mb-0">Bugün üçün problemlərin artım faizi</p>
                        </div>
                        <i class="icon-arrow-up text-primary icon-lg"></i>
                      </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                      <div class="d-flex justify-content-between border-right card-statistics-item">
                        <div>
                          <h1>+<?php echo emigaCalculateTrend($all_problems_month,$all_problems_today);?>%</h1>
                          <p class="text-muted mb-0">Problemlərin 30 Günə nisbətdə Artım Faizi</p>
                        </div>
                        <i class="icon-arrow-up text-primary icon-lg"></i>
                      </div>
                    </div> 

                  </div>
            </div>
        </div>
    </div>

<div class="col-md-12">

    <div class="row">

            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bütün Şöbələr</h4>

                    <div class="table-responsive">
                         <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                     <th>Şöbə</th>
                                     <th>Otaq</th>
                                     <th>Korpus</th>
                                   </tr>
                                 </thead>
                            <tbody>                
<?php           

    $select_departments ="SELECT department_title , department_room , department_space FROM departments ORDER BY department_id DESC ";
    $result = mysqli_query($connect, $select_departments);


    if(mysqli_num_rows($result) > 0)  {  
        while($r = mysqli_fetch_array($result)) {
            
    if (strlen($r['department_title']) > 21){$d_t=substr($r['department_title'], 0,20)."...";}
    else{$d_t=$r['department_title'];}           
    
    if (strlen($r['department_room']) > 21){$d_r=substr($r['department_room'], 0,20)."...";}       
    else{$d_r=$r['department_room'];}           
    

    if (strlen($r['department_space']) > 21){$d_s=substr($r['department_space'], 0,20)."...";}
    else{$d_s=$r['department_space'];}   

    echo "
                        <tr>
                          <td>$d_t</td>
                          <td>$d_r</td>
                          <td>$d_s</td>
                        </tr>    
    ";        
        }
    }
    else{
        echo"<td>Administratorlar tərəfindən heç bir şöbə yaradılmayıb</td>";
    }

?>
                        </tbody>
                    </table>                  
                </div>
             </div>
          </div>
        </div>



            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                <canvas class="p-4" id="total_chart"></canvas>
                </div>
            </div>
        </div>
    </div>


<div class="col-12">
    <div class="row">

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <canvas class="p-4" id="today_chart"></canvas>
                </div>
            </div>

            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ən son yazılan problemlər (10)</h4>
                    <div class="table-responsive">
                         <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                     <th>Adı</th>
                                     <th>Açıqlaması</th>
                                     <th>Adminin açıqlaması</th>
                                   </tr>
                                 </thead>
                            <tbody>                
<?php           

    $select_departments ="SELECT problem_title , problem_description , problem_status_description FROM posts WHERE department_detail='$dep' ORDER BY problem_id DESC ";
    $result = mysqli_query($connect, $select_departments);


    if(mysqli_num_rows($result) > 0)  {  
        while($r = mysqli_fetch_array($result)) {

    if (strlen($r['problem_title']) > 21){$p_t=substr($r['problem_title'], 0,20)."...";}
    else{$p_t=$r['problem_title'];}           
    
    if (strlen($r['problem_description']) > 21){$p_d=substr($r['problem_description'], 0,20)."...";}       
    else{$p_d=$r['problem_description'];}           
    

    if (strlen($r['problem_status_description']) > 21){$s_d=substr($r['problem_status_description'], 0,20)."...";}
    else{$s_d=$r['problem_status_description'];}           


    echo "
                        <tr>
                          <td>$p_t</td>
                          <td>$p_d</td>
                          <td>$s_d</td>
                        </tr>    
    ";        
        }
    }
    else{
        echo"<td> :) Heç bir problem yoxdur</td>";
    }

?>
                        </tbody>
                    </table>                  
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
new Chart(document.getElementById("total_chart"), {
    type: 'pie',
    data: {
      labels: ["Gözləmədə", "Ləğv edilən", "Həll edilən", "Görülən"],
      datasets: [{
        borderColor: ["#c4c4c4","#c4c4c4","#c4c4c4","#c4c4c4"],        
        backgroundColor: ["#b764fc", "#ff5b7f","#63ffa4","#fdffa3"],
        data: [<?php echo emigaStats($total_p).",".emigaStats($total_c).",".emigaStats($total_d).",".emigaStats($total_v);?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Daxil olan bütün problemlərin statistikası'
      }
    }
});
</script>
<script type="text/javascript">
new Chart(document.getElementById("today_chart"), {
    type: 'pie',
    data: {
      labels: ["Gözləmədə", "Ləğv edilən", "Həll edilən", "Görülən"],
      datasets: [{
        borderColor: ["#c4c4c4","#c4c4c4","#c4c4c4","#c4c4c4"],        
        backgroundColor: ["#b764fc", "#ff5b7f","#63ffa4","#fdffa3"],
        data: [<?php echo emigaStats($today_p).",".emigaStats($today_c).",".emigaStats($today_d).",".emigaStats($today_v);?>]
      }]
    },,"#fff","#fff","#fff"
    options: {
      title: {
        display: true,
        text: 'Bugün daxil olan bütün problemlərin statistikası'
      }
    }
});
</script>