<form name="growth_form">
	<div class="multicolumn">
		<div class="column left">
			<label><input name="inhabitants" size="3" maxlength="5" value="">* obyvatel</label><br>
			<label><input name="turns" size="3" maxlength="2" value=""><sup>1</sup> kol k odtahání</label><br>
			<label><input name="demanded_inhabitants" size="3" maxlength="5" value=""><sup>2</sup> požadovaných obyvatel</label>
		</div>
		<div class="column left">
			<label><input type="checkbox" name="granary" checked> Sýpka</label><br>
			<label><input type="radio" name="growth_rate" value="2"> Spokojenost</label><br>
			<label><input type="radio" name="growth_rate" value="1" checked> Bez vlivu kouzel</label><br>
			<label><input type="radio" name="growth_rate" value="0.5"> Nespokojenost</label>
		</div>
	</div><br>
	<br>
	<button type="submit" onclick="growth.allTurns(this.form); return false;">Odtah kol<sup>1</sup></button>
	<button type="button" onclick="growth.neededTurns(this.form);">Potřebny počet kol<sup>2</sup></button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
	<br>
	<div class="singlecolumn">
		<input name="inhabitants_output" size="3" value="" readonly="readonly"> obyvatel<br>
		<input name="turns_output" size="3" value="" readonly="readonly"> potřebných kol<br>
	</div>
</form>
