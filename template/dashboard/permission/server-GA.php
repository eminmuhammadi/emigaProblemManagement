            <div class="box col-lg-12">
                <div class="card">
                  <div class="card-body">
              <div class="row">      
               <div class="col-6 p-4">     
                <h4 class="card-title mb-0">RAM</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                      <div class="d-md-flex">
                        <h2 class="mb-0"><?php echo emigaServerMemory();?>%</h2>
                      </div>
                      <small class="text-gray">maksimum 100%.</small>
                    </div>
                    <div class="d-inline-block">
                      <div class="<?php
                      $ram=emigaServerMemory();
                      if($ram<="49"){
                        echo"bg-success";
                      }
                      else if(($ram>"49") && ($ram<="69")){
                        echo"bg-warning";
                      }
                      else if($ram>"69"){
                        echo"bg-danger";
                      }
                      ?> px-4 py-2 rounded">
                        <i class="icon-speedometer text-white icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>


               <div class="col-6 p-4">     
                <h4 class="card-title mb-0">CPU</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                      <div class="d-md-flex">
                        <h2 class="mb-0"><?php echo emigaServerCpu();?> GHz</h2>
                      </div>
                    </div>
                    <div class="d-inline-block">
                      <div class="<?php
                      $cpu=emigaServerCPU();
                      if(($cpu<="0.5")){
                        echo"bg-success";
                      }
                      else if(($cpu>"0.5") && ($cpu<="1")){
                        echo"bg-warning";
                      }
                      else if($cpu>"1"){
                        echo"bg-danger";
                      }
                      ?> px-4 py-2 rounded">
                        <i class="icon-speedometer text-white icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>    
                    </div>
                </div>
            </div>