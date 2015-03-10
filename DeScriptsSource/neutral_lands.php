<form name="neutral_lands_form">
	<div class="singlecolumn">
		<label><input name="day" size="3" maxlength="3" value="">* den</label><br>
		<label><input name="land_strength" size="3" maxlength="4" value="">* síla neutrálky</label><br>
		<select name="bonus">
<?php
	for ($i = 40; $i <= 160; $i += 5)
		echo "\t\t\t".'<option value="'.($i/100).'"'.($i === 100 ? ' selected' : '').'>'.($i-100).'%</option>'.PHP_EOL;
?>
		</select> bonus obrany
	</div>
	<br>
	<br>
	<button type="submit" onclick="neutral_lands.countDefence(this.form); return false;">Výpočet</button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
	<br>
	<input name="defence_output" size="3" value="" readonly="readonly"> obrana<br>
</form>
<b>útok je potřeba poslat o 1 větší</b><br>
<small>výpočet převzán z <a href="http://www.acoose.wz.cz/neutralky.html">www.acoose.wz.cz</a> a upraven, možné chyby prosím hlaste</small>
