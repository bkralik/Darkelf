// DEScripts
// USES DB.Units

var army_strength = new function() {
	// Counts attack and defence values
	this.countArmyStrength = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var inhabitants = form.inhabitants.getInt(0);
			var units = [0,0,0];
			for (var i=1; i<=3; i++)
				units[i-1] = eval("form.unit" + i).getInt(0);
			var hero_attack = form.hero_attack.getInt(0);
			var hero_attack_bonus = form.hero_attack_bonus.getInt(0);
			var hero_defence = form.hero_defence.getInt(0);
			var hero_defence_bonus = form.hero_defence_bonus.getInt(0);
			var alliance_bonus = form.alliance_bonus.getInt(0);
		} catch(e) {
			if (e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		var race = form.race.getSelectedValue();
		var fortress_bonus;
		switch (form.fortress.getSelectedValue()) {
			case "without_fortress": fortress_bonus = [1,   1]; break;
			case "wooden_walls":     fortress_bonus = [1,   1.1]; break;
			case "small_fortress":   fortress_bonus = [1.1, 1.2]; break;
			case "medium_fortress":  fortress_bonus = [1.25,1.5]; break;
			case "large_fortress":   fortress_bonus = [1.5, 2]; break;
		}
		var land_bonus = parseFloat(form.land_bonus.getSelectedValue());
		var military_shield = parseFloat(form.military_shield.getSelectedValue());
		var field_chapel = form.field_chapel.checked;
		var catapult = form.catapult.checked;
		var paved_roads = form.paved_roads.checked;
		var arena = form.arena.checked;
		var training_grounds = form.training_grounds.checked;
		var corral = form.corral.checked;
		var attack_sanction = form.attack_sanction.checked;
		var hero_race_bonus = form.hero_race_bonus.checked;
		var fear = form.fear.checked;
		var knights_service = form.knights_service.checked;
		// attack
		var attack = 0;
		for (var i = 1; i <= 3; i++)
			attack += units[i-1] * DB.Units[race][i].attack;
		attack *= parseInt(100 + hero_race_bonus*20 + hero_attack_bonus)/100;
		if (fear) attack*= 0.8;
		attack = Math.floor(attack);
		attack += parseInt(hero_attack);
		if (attack >= 100 && field_chapel) attack += 30;
		if (attack >= 200 && catapult) attack += 60;

		var attack_coeficient = fortress_bonus[0];
		if (paved_roads) attack_coeficient += 0.05;
		if (arena) attack_coeficient += 0.1;
		attack *= attack_coeficient;
		attack = Math.floor(attack);
		if (attack_sanction) attack *= 0.7;
		attack = Math.round(attack);
		if (knights_service) attack *= 1.1;
		attack = Math.floor(attack);
		// defence
		var defence = 0;
		for (var i = 1; i <= 3; i++)
			defence += units[i-1] * DB.Units[race][i].defence;

		defence *= 1 + hero_defence_bonus/100;
		defence = Math.floor(defence);
		defence += hero_defence;

		var defence_coeficient = fortress_bonus[1];
		if (training_grounds) defence_coeficient += 0.05;
		defence_coeficient += land_bonus + military_shield;

		defence *= defence_coeficient;
		defence += inhabitants;
		if (corral) defence += 100;
		defence += alliance_bonus * 0.3;
		defence = Math.floor(defence);

		form.attack_output.value = attack;
		form.defence_output.value = defence;
	};
};
