<?php 
    $privatekey = "private key";
    $plublickey = "public key";
    $time = time();

    function gerarhash($privatekey, $plublickey, $time) {
        return md5( $time . $privatekey . $plublickey );
    }

    $hash = gerarhash($privatekey, $plublickey, $time);

    $url = "http://gateway.marvel.com/v1/public/comics?ts={$time}&apikey={$plublickey}&hash={$hash}";

    echo $url;

?>