<?php
function heroAtributeTableRow($attribute, $attribute_name) {
	return '<tr>'.
				'<td>'.$attribute_name.'</td>'.
				'<td><input name="current_'.$attribute.'" size="2" maxlength="2" value=""></td>'.
				'<td>'.
					'<button type="button" onclick="hero.decrement(this.form, \''.$attribute.'\');">-</button> '.
					'<input name="'.$attribute.'" class="number" size="2" maxlength="2" value="0" readonly> '.
					'<button type="button" onclick="hero.increment(this.form, \''.$attribute.'\');">+</button>'.
				'</td>'.
			'</tr>';
}
?>
<form name="hero_form">
	<select name="hero_type" onchange="hero.updateTotalCost(this.form);">
		<option value="mage">Zaklínač</option>
		<option value="offensive_fighter">Bojovník (útočník)</option>
		<option value="defensive_fighter">Bojovník (obranář)</option>
		<option value="fighter">Bojovník (bojeschopnost)</option>
		<option value="destroyer">Ničitel</option>
		<option value="offensive_mage">Mág (útočník)</option>
		<option value="defensive_mage">Mág (obranář)</option>
		<option value="thief">Zloděj</option>
		<option value="novice_hero">Hrdina pro nováčky</option>
        <option value="extra_hero">Extra válečník (útočník)</option>
	</select><br>
	<table class="center">
		<tr><th>Vlastnosti</th><th>Aktuální level</th><th>Počet zlepšení</th></tr>
		<?php echo heroAtributeTableRow('attack', 'Útok').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('defence', 'Obrana').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('spell_power', 'Síla kouzla').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('magical_defence', 'Magická obrana').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('escape', 'Útěk').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('survival', 'Přežití').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('thieving', 'Kradení').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('destruction', 'Destrukce').PHP_EOL; ?>
		<?php echo heroAtributeTableRow('efficiency', 'Bojeschopnost').PHP_EOL; ?>
		<tr><td colspan=2>Celková cena:</td><td><input name="total_cost" class="number" size="13" maxlength="8" value="0" readonly></td></tr>
	</table>
	<br>
	<button type="submit" onclick="hero.updateTotalCost(this.form); return false;">Přepočítat</button>
	<button type="reset" onclick="this.form.clearErrors();">Smazat</button><br>
</form>
