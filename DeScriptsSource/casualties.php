<form name="casualties_form">
	<div class="singlecolumn">
		<label><input name="unit1" size="3" maxlength="5" value=""> počet prvních jednotek</label><br>
		<label><input name="unit2" size="3" maxlength="5" value=""> počet druhých jednotek</label><br>
		<label><input name="unit3" size="3" maxlength="5" value=""> počet třetích jednotek</label><br>
		<label><input name="attack" size="3" maxlength="5" value="">* útok</label><br>
		<label><input name="defence" size="3" maxlength="5" value="">* odhadovaná obrana</label>
	</div><br>
	<br>
	<button type="submit" onclick="casualties.reckonCasualties(this.form); return false;">Výpočet</button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
	<br>
	<div class="singlecolumn">
		<input name="unit1casualties" size="3" value="" readonly="readonly"> mrtvých prvních jednotek<br>
		<input name="unit2casualties" size="3" value="" readonly="readonly"> mrtvých druhých jednotek<br>
		<input name="unit3casualties" size="3" value="" readonly="readonly"> mrtvých třetích jednotek
	</div><br>
</form>
<small>výpočet převzán z <a href="http://www.acoose.wz.cz/obranapodlastrat.html">www.acoose.wz.cz</a> a upraven, možné chyby prosím hlaste</small>
