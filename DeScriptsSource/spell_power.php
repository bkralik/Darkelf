<form name="spell_power_form">
	<div class="multicolumn">
		<div class="column">
			<label><input name="total_land_count" size="3" maxlength="3" value="">* zemí celkem</label><br>
			<br>
			<table id="spell_power-counts">
				<tr>
					<td><label><input name="mage_count1" size="3" maxlength="5" value=""> mágů</label></td>
					<td>v <label><input name="land_count1" size="3" maxlength="3" value=""> zemích</label></td>
				</tr>
			</table>
			<button type="button" onclick="spell_power.addCounts(this.form);">Přidat řádek</button><br>
			<br>
			<div class="singlecolumn">
				<label><input name="spell_power_bonus" size="4" maxlength="6" value="">% bonus</label><br>
				<label><input name="pentagram_count" size="3" maxlength="3" value=""> pentagramů</label>
			</div><br>
			<br>
			<button type="submit" onclick="spell_power.countSpellPower(this.form); return false;">Výpočet</button>
			<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
			<br>
			<div class="singlecolumn">
				<input name="min_spell_power_output" size="4" value="" readonly="readonly"> minimální síla kouzla<br>
				<input name="max_spell_power_output" size="4" value="" readonly="readonly"> maximální síla kouzla
			</div>
		</div>
		<div class="column" style="margin-left:10px;">
			<small>Vyplňte pouze, pokud neznáte celkový bonus</small><br>
			<div class="singlecolumn">
				<label><input name="lesser_magetower" size="3" maxlength="3" value=""> malých magických věží</label><br>
				<label><input name="medium_magetower" size="3" maxlength="3" value=""> středních magických věží</label><br>
				<label><input name="large_magetower" size="3" maxlength="3" value=""> velkých magických věží</label><br>
				<label><input name="heroes_bonus" size="3" maxlength="2" value="">% bonus vlastních hrdinů</label><br>
				<label><input name="others_heroes_bonus" size="3" maxlength="3" value="">% bonus cizích hrdinů</label><br>
			</div><br>
			<button type="button" onclick="spell_power.updateSpellPowerBonus(this.form);">Přepočítat % bonus</button>
		</div>
	</div>
</form>
