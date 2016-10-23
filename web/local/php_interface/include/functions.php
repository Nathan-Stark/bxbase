<?

function p($data,$OnlyAdmin=true,$die=false,$varDump=false,$return=false,$req=''){
	global $USER;

	if( ($USER->IsAdmin() && $OnlyAdmin===true) || $OnlyAdmin===false){
		if ( (!empty($req) && $_REQUEST[$req] == 1) || (empty($req)) ) {
			$debug = ($varDump == true ? var_dump($data) : "<pre>".print_r($data,true)."</pre>\n");
		}
	}
	if($return ===true)
		return $debug;
	else
		echo $debug;

	if(true==$die) die();
}
