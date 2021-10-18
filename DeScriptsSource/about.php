<?php
require_once 'core/UpdatesDB.php';
?>
	<b>Pokud objevíte nějaké chyby nebo budete mít návrhy na zlepšení, napište na bkralik(slaneček)bkralik(tečka)cz, do pošty <a href="http://www.darkelf.cz/ch/posta.asp?forum_hrac=327650" title="nutno být přihlášen v DE">bkralikovi ve hře</a> nebo na <a href="https://discord.gg/QaqPXw94hy">darkelf discord</a>.</b><br>
	<h3>Možné problémy:</h3>
	<ul>
		<li>skripty nefungují - není povolen/dostupný javascript - povolte nebo zapněte skripty</li>
		<li>skripty se chovají divně - je možné, že proběhla aktualizace - nechte znovu načíst celé stránky (většinou CTRL+F5, popřípadě vymazat cache)</li>
		<li>skripty nefungují (IE8) - javascript používá HTMLElement.prototype, což není podporováno v IE8 (IE9 by mělo) - použíjte jiný prohlížeč</li>
		<li>výběr tabů se nezalamuje - skritpy využívá HTML tag, který je oficiálně až v standardu HTML5 - zkuste aktualizovat prohlížeč</li>
	</ul>
	<h3>Poslední změny:</h3>
<?php
$updates = array_reverse(UpdatesDB::getInstance()->getUpdates());
$versions = array_keys($updates);
for ($u = 0; $u < 2; $u++) {
	echo "\t".'Verze '.$versions[$u].PHP_EOL;
	echo $updates[$versions[$u]]->getChangesAsHTML("\t").PHP_EOL;
}
?>
	<a href="updates.html">starší změny</a><br>
	<br>
	<i>vytvořil Ril (2009-<?php echo $updates[$versions[0]]->getYear(); ?>), provozuje bkralik (zdrojáky na <a href="https://github.com/bkralik/Darkelf">githubu</a>)</i>
