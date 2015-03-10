<form name="unit_combinations_form">
	<div class="singlecolumn">
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
		<label><input name="strength" size="3" maxlength="5" value="">* síla země</label>
	</div><br>
	<br>
	<button type="submit" onclick="unit_combinations.generate(this.form); return false;">Výpis všech kombinací</button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
</form>
<small>Kombinace se vypisují v novém okně, pokud nefunguje, je možné, že máte blokované otevírání nových oken.</small><br>
<small>Je možné, že prohlížeč hned neuvolní pamět po náročném výpočtu, doporučuji dávat si na to pozor.</small>
