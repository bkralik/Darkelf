<?php
require_once 'core/UpdatesDB.php';
$updates = array_reverse(UpdatesDB::getInstance()->getUpdates());
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta name="description" content="Změny ve skriptech pro hru Dark elf">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="content-language" content="cs">
	<meta name="author" content="Ril">
	<link href="styles/updates.css" rel="stylesheet" type="text/css">
	<title>Dark elf scripts updates</title>
</head>
<body>
	<a href="index.html">Zpět na skripty</a><br>

	<h3>Obsah:</h3>
<?php
$year = '';
foreach ($updates as $update) {
	$new_year = $update->getYear();
	if ($new_year != $year) {
		$year = $new_year;
		echo "\t".'<a href="#year'.$year.'">'.$year.'</a><br>'.PHP_EOL;
	}
}
?>
<?php
$version_year = '';
foreach ($updates as $update) {
	$new_version_year = $update->getYear();
	if ($new_version_year != $version_year) {
		$version_year = $new_version_year;
		echo PHP_EOL."\t".'<h3 id="year'.$version_year.'">'.$version_year.'</h3>'.PHP_EOL;
	}
	echo "\t".'<h4>Verze '.$update->getVersion().'</h4>'.PHP_EOL;
	echo $update->getChangesAsHTML("\t").PHP_EOL;
}
?>

	<br>
	Starší změny nejsou přímo zaznamenány, avšak první skripty vznikly asi v květnu 2009<br>
	<br>
	<a href="descripts.html">Zpět na skripty</a><br>
</body>
</html>
