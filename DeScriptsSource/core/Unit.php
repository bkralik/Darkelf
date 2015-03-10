<?php
class Unit {
	private $name_english, $race_english, $name_czech, $race_czech;
	private $attack, $defence;
	private $gold, $mana, $upkeep;

	function __construct($name_english, $race_english, $name_czech, $race_czech, $attack, $defence, $gold, $mana, $upkeep) {
		$this->name_english = (string) $name_english;
		$this->race_english = (string) $race_english;
		$this->name_czech = (string) $name_czech;
		$this->race_czech = (string) $race_czech;
		$this->attack = (int) $attack;
		$this->defence = (int) $defence;
		$this->gold = (int) $gold;
		$this->mana = (int) $mana;
		$this->upkeep = (int) $upkeep;
	}

	public static function constructFromArray($array) {
		return new static(
			$array['name_english'], $array['race_english'], $array['name_czech'], $array['race_czech'],
			$array['attack'], $array['defence'], $array['gold'], $array['mana'], $array['upkeep']);
	}

	public function getName_english() {
		return $this->name_english;
	}

	public function getRace_english() {
		return $this->race_english;
	}

	public function getName_czech() {
		return $this->name_czech;
	}

	public function getRace_czech() {
		return $this->race_czech;
	}

	public function getAttack() {
		return $this->attack;
	}

	public function getDefence() {
		return $this->defence;
	}

	public function getGold() {
		return $this->gold;
	}

	public function getMana() {
		return $this->mana;
	}

	public function getUpkeep() {
		return $this->upkeep;
	}
}
?>