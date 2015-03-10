<?php
require_once 'lib/CsvFile.php';
require_once 'lib/DataTable.php';
require_once 'core/Artifact.php';
require_once 'core/ArtifactType.php';
require_once 'core/Race.php';
require_once 'core/Unit.php';
?>
// db.js (DEScripts by Ril)
var DB = new function() {

this.Units = new function() {
	var U = function(a, d) {
		this.attack = a;
		this.defence = d;
	};

	var RU = function(u1, u2, u3) {
		this[1] = u1;
		this[2] = u2;
		this[3] = u3;
	};

<?php
$units_data = DataTable::constructFromCsvFile(new CsvFile('data/units.csv'));

foreach(Race::values() as $race) {
	$units = $units_data->get(array('race_english' => $race));
	$first = true;
	echo "\t".'this[\''.$race.'\'] = new RU(';
	foreach ($units as $unit_array) {
		if (!$first)
			echo ', ';
		$unit = Unit::constructFromArray($unit_array);
		echo 'new U('.$unit->getAttack().','.$unit->getDefence().')';
		$first = false;
	}
	echo ');'.PHP_EOL;
}
?>
};

this.Fortresses = new function() {
	var Fortress = function(a, d) {
		this.attack_bonus = a;
		this.defence_bonus = d;
	};

	this.without_fortress = new Fortress(1,1);
	this.wooden_walls = new Fortress(1,1.1);
};

this.Heroes = new function() {
	var S = function(b, e) {
		this.base_cost = b;
		this.exp_cost = e;
	};

	var HS = function(a, ae, def, defe, sp, spe, md, mde, es, ese, s, se, t, te, des, dese, ef, efe) {
		this.attack = new S(a, ae);
		this.defence = new S(def, defe);
		this.spell_power = new S (sp, spe);
		this.magical_defence = new S(md, mde);
		this.escape = new S(es, ese);
		this.survival = new S(s, se);
		this.thieving = new S(t, te);
		this.destruction = new S(des, dese);
		this.efficiency = new S(ef, efe);
	};

	this.mage =              new HS(350,3,   250,3.1, 520,4,   160,2,   170,2,   170,2,   130,2.4, 130,2.3, 1150,6);
	this.offensive_fighter = new HS(280,2.8, 210,2.9, 600,4.2, 200,2.8, 200,2.4, 150,2.4, 170,2.8, 120,1.8, 1200,5.3);
	this.defensive_fighter = new HS(300,2.9, 190,2.8, 600,4.2, 180,2.7, 210,2.4, 130,2.1, 180,2.9, 120,1.8,  920,4.4);
	this.fighter =           new HS(280,2.8, 220,3,   620,4.3, 220,2.8, 210,2.5, 160,2.4, 200,3,   200,3,    900,4);
	this.destroyer =         new HS(300,2.9, 230,2.9, 570,4.2, 200,2.8, 190,2.2, 120,1.8, 100,2.1, 100,1.6,  800,7);
	this.offensive_mage =    new HS(500,3.4, 390,3.4, 400,3.6, 120,1.8, 180,2.4, 220,2.7, 150,2.6, 140,2.1, 1100,5);
	this.defensive_mage =    new HS(500,3.3, 340,3.3, 450,3.8, 100,1.6, 150,2.4, 200,2.5, 140,2.4, 160,2.5, 1000,4.5);
	this.thief =             new HS(430,3.1, 300,3.1, 540,4,   170,2.2, 120,1.5, 120,1.6,  80,2,   170,2.2, 1100,5);
	this.novice_hero =       new HS(500,4,   400,4,   600,5,   220,3,   220,3,   220,3,   200,3,   200,3,   1300,6);
};

this.Artifacts = new function() {
	this.Repair_costs = new function() {
		this[''] = 0;
		this['squire'] = 1;
		this['orc'] = 1;
		this['legionnaire'] = 1;
		this['knight'] = 2;
		this['dwarf'] = 2;
		this['elf'] = 4;
		this['necromant'] = 8;
		this['mage'] = 8;
		this['dark elf'] = 16;
		this['royal'] = 16;
		this['special'] = 1; // kronikarsky brk
	};

	var A = function(ab, db, a, d, sp, md, es, s, t, des, ef, set) {
		this.attack_bonus = ab;
		this.defence_bonus = db;
		this.attack = a;
		this.defence = d;
		this.spell_power = sp;
		this.magical_defence = md;
		this.escape = es;
		this.survival = s;
		this.thieving = t;
		this.destruction = des;
		this.efficiency = ef;
		this.set = set;
	};

	this['nothing'] = new A(0,0,0,0,0,0,0,0,0,0,0,'');
<?php
$artifacts_data = DataTable::constructFromCsvFile(new CsvFile('data/artifacts.csv'));

foreach(ArtifactType::values() as $artifact_type) {
	$artifacts = $artifacts_data->get(array('type' => $artifact_type));
	foreach ($artifacts as $artifact_array) {
		$artifact = Artifact::constructFromArray($artifact_array);
		echo "\t".'this[\''.$artifact->getId().'\'] = new A('.
			$artifact->getAttack_bonus().','.$artifact->getDefence_bonus().','.$artifact->getAttack().','.$artifact->getDefence().','.
			$artifact->getSpell_power().','.$artifact->getMagical_defence().','.
			$artifact->getEscape().','.$artifact->getSurvival().','.$artifact->getThieving().','.$artifact->getDestruction().','.$artifact->getEfficiency().','.
			'\''.$artifact->getSet().'\');'.PHP_EOL;
	}
}
?>
};

};
