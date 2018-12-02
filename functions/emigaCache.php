<?php

function emigaClearWhiteSpace($buffer){
	return preg_replace('/\s+/', ' ', $buffer);}

function emigaRemoveComments($buffer){
	return preg_replace('/<!--(.|\s)*?-->/', '', $buffer);}

function emigaCacheStart($Comment,$WhiteSpace){
	if($Comment=='1')	{ob_start('emigaRemoveComments');}	
	if($WhiteSpace=='1'){ob_start('emigaClearWhiteSpace');}	}

function emigaCacheStop(){ob_get_flush();}