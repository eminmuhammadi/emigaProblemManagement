<?php
function emigaServerMemory(){
	
	$free = shell_exec('free');
	$free = (string)trim($free);
	$free_arr = explode("\n", $free);
	$mem = explode(" ", $free_arr[1]);
	$mem = array_filter($mem);
	$mem = array_merge($mem);
	$memory_usage = $mem[2]/$mem[1]*100;

	return round($memory_usage);
}


function emigaServerCpu(){

	$load = sys_getloadavg();
	return $load[0];

}
