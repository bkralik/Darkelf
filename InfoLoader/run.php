<?php
require_once('config.php');
require_once('libs/dibi.php');
require_once('libs/phpQuery.php');

dibi::connect($DBOptions);

$tmpFile = tempnam("/tmp", "deCookie");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.darkelf.cz/login.asp?l=3C");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $tmpFile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $tmpFile);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_exec($ch);

for($l = 1; $l <= 100; $l++) {
    curl_setopt($ch, CURLOPT_URL, "http://www.darkelf.cz/l.asp?id=".$l);
    $output = iconv('CP1250','utf-8', curl_exec($ch));
    echo($output);
}
curl_close($ch);    

unlink($tmpFile);


