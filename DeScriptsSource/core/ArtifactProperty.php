<?php
final class ArtifactProperty {
	const ATTACK_BONUS = 'attack_bonus';
	const DEFENCE_BONUS = 'defence_bonus';
	const ATTACK = 'attack';
	const DEFENCE = 'defence';
	const SPELL_POWER = 'spell_power';
	const MAGICAL_DEFENCE = 'magical_defence';
	const ESCAPE = 'escape';
	const SURVIVAL = 'survival';
	const THIEVING = 'thieving';
	const DESTRUCTION = 'destruction';
	const EFFICIENCY = 'efficiency';


	public static function values() {
		return array(self::ATTACK_BONUS, self::DEFENCE_BONUS, self::ATTACK, self::DEFENCE, self::SPELL_POWER, self::MAGICAL_DEFENCE,
			self::ESCAPE, self::SURVIVAL, self::THIEVING, self::DESTRUCTION, self::EFFICIENCY);
	}

	private function __construct() {}
}
?>
