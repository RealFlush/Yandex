<?php

function get_stat( $url, $headers )
{
    $handle = curl_init();
    curl_setopt( $handle, CURLOPT_URL, $url );
    curl_setopt( $handle, CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, false );
    curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
    $response = curl_exec( $handle );
    $code = curl_getinfo( $handle, CURLINFO_HTTP_CODE );
    return array( "code" => $code, "response" => $response );
}

//$url_yandex_disk=htmlspecialchars($_POST['FileName']);

	$url_yandex_disk=($_POST['Filename']);	
$result = get_stat( "https://cloud-api.yandex.net:443/v1/disk/public/resources/download?public_key=" . urlencode( $url_yandex_disk ), array() );
	if( $result["code"] == 200 )
	{
 	 $result["response"] = json_decode( $result["response"], true );
 
	  echo '<h2> Your link to download File <h2> <a href="' . $result["response"]["href"] . '&url=localhost">Download</a>. You must download this file into folder "downloads"';
echo '<br> <a href="/index.php">MainPage</a> <br>';


	}

	else
	{
  		echo "Error. Pay attention on fy.html ";
	}

?>


