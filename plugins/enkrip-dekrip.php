<?php
function enkrip($plaintext){
    $key = "p3176h@l@176";
    $iv = "abcdefghij123456";

    $chiper = mcrypt_module_open('rijndael-128','','cbc','');
    mcrypt_generic_init($chiper,$key,$iv);

    $chipertext = base64_encode(mcrypt_generic($chiper,$plaintext));
    mcrypt_generic_deinit($chiper);
    mcrypt_module_close($chiper);

    return $chipertext;
}

function dekrip($chipertext){
    $chipertext_dec = base64_decode($chipertext);
    $key = "p3176h@l@176";
    $iv = "abcdefghij123456";

    $chiper = mcrypt_module_open('rijndael-128','','cbc','');
    mcrypt_generic_init($chiper, $key, $iv);

    $plaintext = mdecrypt_generic($chiper, $chipertext_dec);

    mcrypt_generic_deinit($chiper);
    mcrypt_module_close($chiper);

    return $plaintext;
}

?>