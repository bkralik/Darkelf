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
		var magic_tower = form.magic_tower.getSelectedValue();
		var magic_shield = parseFloat(form.magic_shield.getSelectedValue());

		var magical_defence = 0;
		if(houses > 0) magical_defence = 3 * mages * mages / houses;
		//                           cislo            + cislo)*(cislo +     0,xx )
		magical_defence = eval("(" + magical_defence + magic_tower + "+" + (heroes_bonus/100) + ")");
		// Mozna se pocita dohromady s ostatnimi bonusy
		magical_defence *= magic_shield;
		if(magic_grove) magical_defence += 5;
		form.magical_defence_output.value = Math.floor(magical_defence);
	};
};