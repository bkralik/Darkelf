// JavaScript Document
// DEScripts

var magical_defence = new function() {
	/***** PRIVATE *****/
	/***** PUBLIC *****/
	// Counts magical defence
	this.countMagicalDefence = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var mages = form.mages.getInt(0);
			var houses = form.houses.getInt(0);
			var heroes_bonus = form.heroes_bonus.getInt(0);
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		if(mages > houses) {
			alert("Mágů je víc než domů");
			return;
		}
		var magic_grove = form.magic_grove.checked;
		var magic_tower_summary = form.magic_tower.getSelectedValue().split(";");
		var magic_shield = parseFloat(form.magic_shield.getSelectedValue());

		var magic_tower_add = parseFloat(magic_tower_summary[0]);
		var magic_tower_multi = parseFloat(magic_tower_summary[1]);

		var magical_defence = 0;
		if(houses > 0) magical_defence = 3 * mages * mages / houses;

		magical_defence = magical_defence * (magic_tower_multi + heroes_bonus / 100) + magic_tower_add;

		// Mozna se pocita dohromady s ostatnimi bonusy
		magical_defence *= magic_shield;
		if(magic_grove) magical_defence += 10;
		form.magical_defence_output.value = Math.floor(magical_defence);
	};
};
