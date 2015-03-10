<?php
final class Race {
	const MEN = 'men';
	const BARBARIANS = 'barbarians';
	const ORCS = 'orcs';
	const URUKS = 'uruks';
	const NECROMANCERS = 'necromancers';
	const MAGI = 'magi';
	const ELVES = 'elves';
	const DARK_ELVES = 'dark elves';
	const DWARVES = 'dwarves';
	const HOBBITS = 'hobbits';
	const ENTS = 'ents';

	public static function values() {
		return array(self::MEN, self::BARBARIANS, self::ORCS, self::URUKS, self::NECROMANCERS, self::MAGI, self::ELVES, self::DARK_ELVES, self::DWARVES, self::HOBBITS, self::ENTS);
	}

	private function __construct() {}
}
?>
