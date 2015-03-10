<form name="defence_guess_form">
	<div class="singlecolumn">
		<label><input name="attack" size="3" maxlength="5" value="">* útok</label><br>
		<label><input name="units" size="3" maxlength="5" value="">* jednotek, kterých útočilo nejvíc</label><br>
		<label><input name="casualties" size="3" maxlength="5" value="">* jejich ztráty</label>
	</div><br>
	<small>v některých případech může vést zadání ztrát dvou jednotek po sobě k přesnějšímu odhadu</small><br>
	<br>
	<button type="submit" onclick="defence_guess.guessDefence(this.form); return false;">Výpočet</button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
	<br>
	<div class="singlecolumn">
		<input name="min_defence_output" size="3" value="" readonly="readonly"> minimální obrana<br>
		<input name="max_defence_output" size="3" value="" readonly="readonly"> maximální obrana
	</div><br>
</form>
<small>výpočet převzán z <a href="http://www.acoose.wz.cz/obranapodlastrat.html">www.acoose.wz.cz</a> a upraven, možné chyby prosím hlaste</small>
