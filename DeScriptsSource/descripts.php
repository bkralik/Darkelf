<?php
require_once 'core/UpdatesDB.php';

$version = UpdatesDB::getInstance()->getLatestVersion();
?>
<!DOCTYPE HTML>
<html lang="cs">
<head>
	<meta name="description" content="Skripty pro hru Dark elf">
	<meta name="keywords" content="dark elf, skripty, scripts">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="Ril">
	<link href="styles/tabber.css" rel="stylesheet" type="text/css">
	<link href="styles/descripts.css" rel="stylesheet" type="text/css">
	<link href="styles/skin.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" charset="utf-8" src="scripts/descripts.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/tabber.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/db.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/neutral_lands.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/growth.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/army_strength.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/spell_power.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/magical_defence.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/attack_guess.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/defence_guess.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/casualties.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/unit_combinations.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/hero.js?v=<?php echo $version; ?>"></script>
	<script type="text/javascript" charset="utf-8" src="scripts/artifacts.js?v=<?php echo $version; ?>"></script>
	<title>Dark elf scripts</title>
</head>

<body>

<noscript>
	<h3 class="center">Bohužel nemáte povolen JavaScript a tak nemůžete tento script použit</h3>
</noscript>

<h4 id="version">Dark elf scripts v. <?php echo UpdatesDB::getInstance()->getLatestVersion(); ?></h4>

<!--
<a href="http://www.asasini.own.cz/">Zpět na alianční stránky</a>
-->

<div id="tabber"> <!-- Beginning of tabber -->

<div id="about" class="tabber_tab" title="O skriptech">
<?php include 'about.php'; ?>
</div>

<div id="neutral_lands" class="tabber_tab" title="Síla neutrálek">
<?php include 'neutral_lands.php'; ?>
</div>

<div id="growth" class="tabber_tab" title="Porodnost">
<?php include 'growth.php'; ?>
</div>

<div id="army_strength" class="tabber_tab" title="Útok, obrana">
<?php include 'army_strength.php'; ?>
</div>

<div id="spell_power" class="tabber_tab" title="Síla kouzel">
<?php include 'spell_power.php'; ?>
</div>

<div id="magical_defence" class="tabber_tab" title="Magická obrana">
<?php include 'magical_defence.php'; ?>
</div>

<div id="attack_guess" class="tabber_tab" title="Odhad útoku">
<?php include 'attack_guess.php'; ?>
</div>

<div id="defence_guess" class="tabber_tab" title="Odhad obrany">
<?php include 'defence_guess.php'; ?>
</div>

<div id="casualties" class="tabber_tab" title="Odhad ztrát">
<?php include 'casualties.php'; ?>
</div>

<div id="unit_combinations" class="tabber_tab" title="Kombinace jednotek">
<?php include 'unit_combinations.php'; ?>
</div>

<div id="hero" class="tabber_tab" title="Hrdina">
<?php include 'hero.php'; ?>
</div>

<div id="artifacts" class="tabber_tab" title="Artefakty">
<?php include 'artifacts.php'; ?>
</div>

</div> <!-- End of tabber -->

</body>
</html>
