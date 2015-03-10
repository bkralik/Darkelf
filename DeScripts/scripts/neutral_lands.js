// JavaScript Document
// DEScripts
// USES DB.Units

var neutral_lands = new function() {
	/***** PRIVATE *****/
	var VARLET = 6;
	var WIZARD = 2;
	var varlet_defence = DB.Units.men[1].defence;
	var wizard_defence = DB.Units.men[3].defence;
	var varlet_strength = DB.Units.men[1].attack + DB.Units.men[1].defence;
	var wizard_strength = DB.Units.men[3].attack + DB.Units.men[3].defence;
	var starting_strength = VARLET*varlet_strength + WIZARD*wizard_strength;

	/***** PUBLIC *****/
	// Counts defence of neutral land
	this.countDefence = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var day = form.day.getInt();
			var strength = form.land_strength.getInt();
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		var bonus = parseFloat(form.bonus.getSelectedValue());

		if(strength < starting_strength + day * varlet_strength || strength > starting_strength + day*(2*varlet_strength + 2*wizard_strength)) {
			alert("Neplatná síla neutrálky.");
			return;
		}
		strength -= starting_strength;
		var varlet = 0;
		var wizard = 0;
		while(strength > 0) {
			if(strength%varlet_strength === 0 && strength/varlet_strength <= 2*day) {
				varlet = strength/varlet_strength;
				strength = 0;
			} else {
				wizard++;
				if(wizard > 2*day)
					break;
				strength -= wizard_strength;
			}
		}
		if(strength || varlet < day) {
			alert("Nelze spočítat.");
			return;
		}
		form.defence_output.value = Math.floor(((VARLET + varlet)*varlet_defence + (WIZARD + wizard)*wizard_defence)*(bonus) + 10 + day);
	};
};