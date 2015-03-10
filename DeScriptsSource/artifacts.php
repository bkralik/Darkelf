<?php
require_once 'core/ArtifactProperty.php';

function artifactAtributeCell($attribute) {
	return '<td><input name="'.$attribute.'" class="number" size="2" value="0" readonly></td>';
}

function artifactTypeAtributesCells($artifact_type) {
	$artifact_attributes = array_merge(ArtifactProperty::values(), array('repair_cost'));
	$string = '';
	foreach ($artifact_attributes as $artifact_attribute)
		$string .= "\t\t\t".artifactAtributeCell($artifact_type.'_'.$artifact_attribute).PHP_EOL;
	return $string;
}
?>
<form name="artifacts_form">
	<table class="center">
		<tr>
			<th>Artefakt</th><th>Útok</th><th>Obrana</th><th>Útok %</th><th>Obrana %</th><th>Síla kouzel</th><th>Magická obrana</th><th>Útěk</th>
			<th>Přežití</th><th>Kradení</th><th>Destrukce</th><th>Bojeschopnost</th><th>Cena opravy</th>
		</tr>
		<tr>
			<td>
				<select name="coat" onchange="artifacts.update(this.form,'coat');">
					<option value="nothing">Plášt</option>
					<option value="dratena plastenka">Drátěná pláštěnka (zbrojnoš)</option>
					<option value="vlci kozesina">Vlčí kožešina (skřet)</option>
					<option value="plast centuria">Plášt centuria (legionář)</option>
					<option value="hedvabny plast">Hedvábný plášť (rytíř)</option>
					<option value="hornicka plastenka">Hornická pláštěnka (trpaslík)</option>
					<option value="plast z lorienu">Plášť z Lórienu (elf)</option>
					<option value="plast temnoty">Plášť temnoty (nekromant)</option>
					<option value="cerveny plast">Červený plášť (mág)</option>
					<option value="plast mlhy">Plášť mlhy (dark elf)</option>
					<option value="hermelinovy plast">Hermelínový plášť (královský set)</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('coat'); ?>
		</tr>
		<tr>
			<td>
				<select name="head" onchange="artifacts.update(this.form,'head');">
					<option value="nothing">Hlava</option>
					<option value="zelezny klobouk">Železný klobouk (zbrojnoš)</option>
					<option value="skreti prilba">Skřetí přilba (skřet)</option>
					<option value="prilba legionare">Přilba legionáře (legionář)</option>
					<option value="rytirska prilba">Rytířská přilba (rytíř)</option>
					<option value="trpaslici helma">Trpasličí helma (trpaslík)</option>
					<option value="feanorova prilba">Fëanorova přilba (elf)</option>
					<option value="helma nazgula">Helma nazgůla (nekromant)</option>
					<option value="klobouk spicak">Klobouk Špičák (mág)</option>
					<option value="koruna nadvlady">Koruna nadvlády (dark elf)</option>
					<option value="svatovaclavska koruna">Svatováclavská koruna (královský set)</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('head'); ?>
		</tr>
		<tr>
			<td>
				<select name="weapon" onchange="artifacts.update(this.form,'weapon');">
					<option value="nothing">Zbraň</option>
					<option value="zelezne kopi">Železné kopí (zbrojnoš)</option>
					<option value="skreti savla">Skřetí šavle (skřet)</option>
					<option value="gladius">Gladius (legionář)</option>
					<option value="rytirsky mec">Rytířský meč (rytíř)</option>
					<option value="valecna sekera">Válečná sekera (trpaslík)</option>
					<option value="mec anduril">Meč Andúril (elf)</option>
					<option value="angmarsky mec">Angmarský meč (nekromant)</option>
					<option value="angmarska hul">Angmarská hůl (nekromant)</option>
					<option value="hul maga">Hůl mága (mág)</option>
					<option value="dark elfi hul">Dark Elfí hůl (dark elf)</option>
					<option value="mec krale vaclava">Meč krále Václava (královský set)</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('weapon'); ?>
		</tr>
		<tr>
			<td>
				<select name="armor" onchange="artifacts.update(this.form,'armor');">
					<option value="nothing">Brnění</option>
					<option value="lneny varkoc">Lněný varkoč (zbrojnoš)</option>
					<option value="skreti zbroj">Skřetí zbroj (skřet)</option>
					<option value="legionarska zbroj">Legionářská zbroj (legionář)</option>
					<option value="platova zbroj">Plátová zbroj (rytíř)</option>
					<option value="dratena kosile">Drátěná košile (trpaslík)</option>
					<option value="mithrilova zbroj">Mithrilová zbroj (elf)</option>
					<option value="cerna zbroj">Černá zbroj (nekromant)</option>
					<option value="modre roucho">Modré roucho (mág)</option>
					<option value="roucho dark elfa">Roucho Dark Elfa (dark elf)</option>
					<option value="zbroj ceskeho lva">Zbroj Českého lva (královský set)</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('armor'); ?>
		</tr>
		<tr>
			<td>
				<select name="ring" onchange="artifacts.update(this.form,'ring');">
					<option value="nothing">Prsten</option>
					<option value="mosazny prsten">Mosazný prsten (zbrojnoš)</option>
					<option value="zelezny prsten">Železný prsten (skřet)</option>
					<option value="rubinovy prsten">Rubínový prsten (legionář)</option>
					<option value="safirovy prsten">Safírový prsten (rytíř)</option>
					<option value="smaragdovy prsten">Smaragdový prsten (trpaslík)</option>
					<option value="prsten nadeje">Prsten naděje (elf)</option>
					<option value="amulet smrti">Amulet smrti (nekromant)</option>
					<option value="draci kamen">Dračí kámen (mág)</option>
					<option value="jeden prsten">Jeden Prsten (dark elf)</option>
					<option value="zezlo">Žezlo (královský set)</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('ring'); ?>
		</tr>
		<tr>
			<td>
				<select name="shield" onchange="artifacts.update(this.form,'shield');">
					<option value="nothing">Štít</option>
					<option value="dreveny stit">Dřevěný štít (zbrojnoš)</option>
					<option value="skreti stit">Skřetí štít (skřet)</option>
					<option value="legionarsky stit">Legionářský štít (legionář)</option>
					<option value="erbovni stit">Erbovní štít (rytíř)</option>
					<option value="klanovy stit">Klanový štít (trpaslík)</option>
					<option value="elfi stit">Elfí štít (elf)</option>
					<option value="stit smrtihlav">Štít Smrtihlav (nekromant)</option>
					<option value="ochranny amulet">Ochranný amulet (mág)</option>
					<option value="ohnivy stit">Ohnivý štít (dark elf)</option>
					<option value="kralovske jablko">Královské jablko (královský set)</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('shield'); ?>
		</tr>
		<tr>
			<td>
				<select name="pocket" onchange="artifacts.update(this.form,'pocket');">
					<option value="nothing">Kapsa</option>
					<option value="ochranny pergamen">Ochranný pergamen (zbrojnoš)</option>
					<option value="lebka maga">Lebka mága (skřet)</option>
					<option value="magicky svitek">Magický svitek (legionář)</option>
					<option value="kniha kouzel">Kniha kouzel (rytíř)</option>
					<option value="stela staresiny">Stéla stařešiny (trpaslík)</option>
					<option value="noldorsky luk">Noldorský luk (elf)</option>
					<option value="kniha mrtvych">Kniha mrtvých (nekromant)</option>
					<option value="vestici koule">Věštící koule (mág)</option>
					<option value="palantyr moci">Palantir moci (dark elf)</option>
					<option value="kralovsky dekret">Královský dekret (královský set)</option>
					<option value="kronikarsky brk">Kronikářský brk</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('pocket'); ?>
		</tr>
		<tr>
			<td>
				<select name="shoes" onchange="artifacts.update(this.form,'shoes');">
					<option value="nothing">Boty</option>
					<option value="kozene boty">Kožené boty (zbrojnoš)</option>
					<option value="skreti bagancata">Skřetí bagančata (skřet)</option>
					<option value="legionarske sandaly">Legionářské sandály (legionář)</option>
					<option value="zelezne obuti">Železné obutí (rytíř)</option>
					<option value="havirske boty">Havířské boty (trpaslík)</option>
					<option value="zdobene body">Zdobené boty (elf)</option>
					<option value="cerne holenice">Černé holenice (nekromant)</option>
					<option value="boty z baziliska">Boty z baziliška (mág)</option>
					<option value="draci boty">Dračí boty (dark elf)</option>
					<option value="kralovske boty">Královské boty (královský set)</option>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('shoes'); ?>
		</tr>
		<tr><td colspan=13><hr></td></tr>
		<tr>
			<td>Celkem:</td>
<?php echo artifactTypeAtributesCells('total'); ?>
		</tr>
	</table>
	<button type="reset" onclick="artifacts.resetForm(this.form);">Smazat</button><br>
</form>
