<?php
    if (!function_exists("dd")){
        function dd($mValue, $s = false){
            if(is_null($mValue) || is_bool($mValue)){
                var_dump($mValue);
            } else {
                print_r($mValue);
            };
            if ($s) var_dump(debug_backtrace());
            exit();
        }
    }
    require_once dirname(__DIR__).'/locale/Locale.php';
    $oL = new Locale();
    $db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db = "indikativ";
	
	$connection = mysqli_connect($db_host, $db_user, $db_pass);
    if (mysqli_connect_errno()) {
		printf("Serverde baylanys jok: %s\n", mysqli_connect_error());
	}
	    mysqli_select_db($connection,$db);
		mysqli_set_charset($connection, "utf8");

?>