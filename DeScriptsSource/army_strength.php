<form name="army_form">
	<div class="multicolumn">
		<div class="column left">
			<select name="race">
				<option value="men">Lidé</option>
				<option value="barbarians">Barbaři</option>
				<option value="orcs">Skřeti</option>
				<option value="uruks">Skuruti</option>
				<option value="necromancers">Nekromanti</option>
				<option value="magi">Mágové</option>
				<option value="elves">Elfové</option>
				<option value="dark elves">Temní Elfové</option>
				<option value="dwarves">Trpaslíci</option>
				<option value="hobbits">Hobiti</option>
				<option value="ents">Enti</option>
			</select><br>
			<label><input name="inhabitants" size="3" maxlength="5" value=""> obyvatel</label><br>
			<label><input name="unit1" size="3" maxlength="5" value=""> prvních jednotek</label><br>
			<label><input name="unit2" size="3" maxlength="5" value=""> druhých jednotek</label><br>
			<label><input name="unit3" size="3" maxlength="5" value=""> třetích jednotek</label><br>
			<select name="fortress">
				<option value="without_fortress">Bez pevnosti</option>
				<option value="wooden_walls">Dřevěné hradby</option>
				<option value="small_fortress">Malá pevnost</option>
				<option value="medium_fortress">Střední pevnost</option>
				<option value="large_fortress">Velká pevnost</option>
			</select>
		</div>
		<div class="column left">
			<label><input type="checkbox" name="field_chapel"> Polní modlitebna</label><br>
			<label><input type="checkbox" name="catapult"> Katapult</label><br>
			<label><input type="checkbox" name="paved_roads"> Kamenné cesty</label><br>
			<label><input type="checkbox" name="arena"> Aréna</label><br>
			<label><input type="checkbox" name="corral"> Obranné vozy</label><br>
			<label><input type="checkbox" name="training_grounds"> Cvičiště</label>
		</div>
	</div><br>
	<br>
	<div class="singlecolumn">
		<select name="land_bonus">
<?php
	for ($i = -60; $i<=60; $i += 5)
		echo "\t\t\t".'<option value="'.($i/100).'"'.($i==0?' selected':'').'>'.$i.'%</option>'.PHP_EOL;
?>
		</select> bonus obrany země<br>
		<select name="military_shield">
<?php
	for ($i = 0; $i<=35; $i += 5)
		echo "\t\t\t".'<option value="'.($i/100).'">'.$i.'%</option>'.PHP_EOL;
?>
		</select> vojenský štít
	</div><br>
	<br>
	Hrdinův útok<br>
	+<input name="hero_attack" size="2" maxlength="3" value="">
	<input name="hero_attack_bonus" size="2" maxlength="3" value="">%<br>
	Hrdinova obrana<br>
	+<input name="hero_defence" size="2" maxlength="3" value="">
	<input name="hero_defence_bonus" size="2" maxlength="3" value="">%<br>
	<br>
	<label><input name="alliance_bonus" size="3" maxlength="5" value=""> celková obrana zemí s vojenskými smlouvami</label><br>
	<div class="singlecolumn">
		<label><input type="checkbox" name="attack_sanction"> 30% postih na útok</label><br>
		<label><input type="checkbox" name="hero_race_bonus"> 20% bonus hrdiny na útok</label><br>
		<label><input type="checkbox" name="fear"> strach (20% postih)</label><br>
		<label><input type="checkbox" name="knights_service"> pomoc rytíře</label><br>
	</div><br>
	<br>
	<button type="submit" onclick="army_strength.countArmyStrength(this.form); return false;">Výpočet</button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
	<br>
	<div class="singlecolumn">
		<input name="attack_output" size="3" value="" readonly="readonly"> útok<br>
		<input name="defence_output" size="3" value="" readonly="readonly"> obrana
	</div>
</form>
