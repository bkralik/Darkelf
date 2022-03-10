<form name="magical_defence_form">
	<div class="singlecolumn">
		<label><input name="mages" size="3" maxlength="5" value=""> magických jednotek</label><br>
		<label><input name="houses" size="3" maxlength="5" value=""> domů</label>
	</div><br>
	<br>
	<label><input type="checkbox" name="magic_grove"> Magický háj</label><br>
	<br>
	<select name="magic_tower">
		<option value="0;1">Bez magické věže</option>
		<option value="50;1">Obranná magická věž</option>
		<option value="5;1">Obřadní svatyně</option>
		<option value="20;1">Malá magická věž</option>
		<option value="0;1.5">Střední magická věž</option>
		<option value="0;2.0">Velká magická věž</option>
		<option value="0;4.0">Chrám</option>
	</select> <br>
	<br>
	<label><input name="heroes_bonus" size="2" maxlength="2" value="">% bonus hrdiny</label><br>
	<br>
	<select name="magic_shield">
<?php
	for ($i = 0; $i <= 35; $i += 5)
		echo "\t\t".'<option value="'.(1+($i/100)).'">'.$i.'%</option>'.PHP_EOL;
?>
	</select> magický štít<br>
	<br>
	<button type="submit" onclick="magical_defence.countMagicalDefence(this.form); return false;">Výpočet</button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
	<br>
	<input name="magical_defence_output" size="4" value="" readonly="readonly"> magická obrana<br>
</form>
