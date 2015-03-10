<?php
require_once('config.php');

require_once('vendor/autoload.php');

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

for($l = 1; $l <= 1; $l++) {
    curl_setopt($ch, CURLOPT_URL, "http://www.darkelf.cz/l.asp?id=".$l);
    //$output = iconv('CP1250','utf-8', curl_exec($ch));
    $output = curl_exec($ch);
    echo(iconv('CP1250','utf-8', $output));
    echo("-------------\n");
    $doc = qp($output, 'table');
    $landName =  $doc->find('th:contains(Ciz)')->text();
    echo($landName);
    $td1 =  $doc->find('td:contains(vojska)');
    $t = $td1->next()->text();
    echo($t);
    echo("-------------\n");
}
curl_close($ch);    

unlink($tmpFile);


