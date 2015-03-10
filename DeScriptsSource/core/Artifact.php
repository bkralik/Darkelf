<?php
require_once 'ArtifactProperty.php';

class Artifact {
	const ID = 'id';
	const SET = 'set';

	private $id, $set;
	private $attack_bonus, $defence_bonus, $attack, $defence;
	private $spell_power, $magical_defence;
	private $escape, $survival, $thieving, $destruction, $efficiency;

	public function __construct($id, $set, $attack_bonus, $defence_bonus, $attack, $defence, $spell_power, $magical_defence, $escape, $survival, $thieving, $destruction, $efficiency) {
		$this->id = $id;
		$this->set = (string) $set;
		$this->attack_bonus = (int) $attack_bonus;
		$this->defence_bonus = (int) $defence_bonus;
		$this->attack = (int) $attack;
		$this->defence = (int) $defence;
		$this->spell_power = (int) $spell_power;
		$this->magical_defence = (int) $magical_defence;
		$this->escape = (int) $escape;
		$this->survival = (int) $survival;
		$this->thieving = (int) $thieving;
		$this->destruction = (int) $destruction;
		$this->efficiency = (int) $efficiency;
	}

	public static function constructFromArray($array) {
		return new static(
			$array[static::ID], $array[static::SET],
			$array[ArtifactProperty::ATTACK_BONUS], $array[ArtifactProperty::DEFENCE_BONUS], $array[ArtifactProperty::ATTACK], $array[ArtifactProperty::DEFENCE],
			$array[ArtifactProperty::SPELL_POWER], $array[ArtifactProperty::MAGICAL_DEFENCE],
			$array[ArtifactProperty::ESCAPE], $array[ArtifactProperty::SURVIVAL], $array[ArtifactProperty::THIEVING], $array[ArtifactProperty::DESTRUCTION], $array[ArtifactProperty::EFFICIENCY]);
	}

	public function getId() {
		return $this->id;
	}

	public function getSet() {
		return $this->set;
	}

	public function getAttack_bonus() {
		return $this->attack_bonus;
	}

	public function getDefence_bonus() {
		return $this->defence_bonus;
	}

	public function getAttack() {
		return $this->attack;
	}

	public function getDefence() {
		return $this->defence;
	}

	public function getSpell_power() {
		return $this->spell_power;
	}

	public function getMagical_defence() {
		return $this->magical_defence;
	}

	public function getEscape() {
		return $this->escape;
	}

	public function getSurvival() {
		return $this->survival;
	}

	public function getThieving() {
		return $this->thieving;
	}

	public function getDestruction() {
		return $this->destruction;
	}

	public function getEfficiency() {
		return $this->efficiency;
	}
}
?>
