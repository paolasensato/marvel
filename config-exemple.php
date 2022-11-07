<?php 
    $privatekey = "private key";
    $plublickey = "public key";
    $time = time();

    function gerarhash($privatekey, $plublickey, $time) {
        return md5( $time . $privatekey . $plublickey );
    }

    $hash = gerarhash($privatekey, $plublickey, $time);

    $url = "https://gateway.marvel.com:443/v1/public/";
    $apiKey = "ts={$time}&apikey={$plublickey}&hash={$hash}";

    $imageSizeUrl = "/portrait_incredible.";
?>
