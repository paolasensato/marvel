<?php 
    $privatekey = "private key";
    $plublickey = "public key";
    $time = time();

    function gerarhash($privatekey, $plublickey, $time) {
        return md5( $time . $privatekey . $plublickey );
    }

    $hash = gerarhash($privatekey, $plublickey, $time);

    $url = "ts={$time}&apikey={$plublickey}&hash={$hash}";

    echo $url;

?>