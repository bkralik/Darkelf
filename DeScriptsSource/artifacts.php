<?php
require_once 'core/ArtifactProperty.php';
require_once 'lib/CsvFile.php';
require_once 'lib/DataTable.php';
require_once 'core/Artifact.php';
require_once 'core/ArtifactType.php';
require_once 'core/Race.php';
require_once 'core/Unit.php';

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

function artifactOptionList($type) {
  $artifacts_data = DataTable::constructFromCsvFile(new CsvFile('data/artifacts.csv'));
  $sets = array(
    "dwarf" => "trpaslík",
		"elf" => "elf",
		"knight" => "rytíř",
		"legionnaire" => "legionář",
		"mage" => "mág",
		"necromant" => "nekromant",
		"orc" => "skřet",
		"royal" => "královský set",
    "dark elf" => "dark elf",
		"squire" => "zbrojnoš");
 
  $artifacts = $artifacts_data->get(array('type' => $type));
  foreach ($artifacts as $artifact_array) {
  	$artifact = Artifact::constructFromArray($artifact_array); 
  	?><option value="<?= $artifact->getId(); ?>"><?= $artifact->getName(); ?><?= ((!empty($sets[$artifact->getSet()]))?" (".$sets[$artifact->getSet()].")":""); ?></option>
    <?php
  }
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
          <?php artifactOptionList('coat'); ?>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('coat'); ?>
		</tr>
		<tr>
			<td>
				<select name="head" onchange="artifacts.update(this.form,'head');">
					<option value="nothing">Hlava</option>
					<?php artifactOptionList('head'); ?>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('head'); ?>
		</tr>
		<tr>
			<td>
				<select name="weapon" onchange="artifacts.update(this.form,'weapon');">
					<option value="nothing">Zbraň</option>
					<?php artifactOptionList('weapon'); ?>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('weapon'); ?>
		</tr>
		<tr>
			<td>
				<select name="armor" onchange="artifacts.update(this.form,'armor');">
          <option value="nothing">Brnění</option>
					<?php artifactOptionList('armor'); ?>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('armor'); ?>
		</tr>
		<tr>
			<td>
				<select name="ring" onchange="artifacts.update(this.form,'ring');">
          <option value="nothing">Prsten</option>
					<?php artifactOptionList('ring'); ?>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('ring'); ?>
		</tr>
		<tr>
			<td>
				<select name="shield" onchange="artifacts.update(this.form,'shield');">
          <option value="nothing">Štít</option>
					<?php artifactOptionList('shield'); ?>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('shield'); ?>
		</tr>
		<tr>
			<td>
				<select name="pocket" onchange="artifacts.update(this.form,'pocket');">
          <option value="nothing">Kapsa</option>
					<?php artifactOptionList('pocket'); ?>
				</select>
			</td>
<?php echo artifactTypeAtributesCells('pocket'); ?>
		</tr>
		<tr>
			<td>
				<select name="shoes" onchange="artifacts.update(this.form,'shoes');">
          <option value="nothing">Boty</option>
					<?php artifactOptionList('shoes'); ?>
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
