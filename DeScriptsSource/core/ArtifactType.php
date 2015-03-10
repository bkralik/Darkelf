<?php
final class ArtifactType {
	const COAT = 'coat';
	const HEAD = 'head';
	const WEAPON = 'weapon';
	const ARMOR = 'armor';
	const RING = 'ring';
	const SHIELD = 'shield';
	const POCKET = 'pocket';
	const SHOES = 'shoes';

	public static function values() {
		return array(self::COAT, self::HEAD, self::WEAPON, self::ARMOR, self::RING, self::SHIELD, self::POCKET, self::SHOES);
	}

	private function __construct() {}
}
?>
