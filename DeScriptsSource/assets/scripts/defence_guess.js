// JavaScript Document
// DEScripts

var defence_guess = new function() {
	/***** PRIVATE *****/
	/***** PUBLIC *****/
	// Fuess defence
	this.guessDefence = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var attack = form.attack.getInt();
			var units = form.units.getInt();
			if (units === 0)
				throw new Exception("IllealArgument","Nulový počet jednotek - nelze nic spočítat",form.units);
			var casualties = form.casualties.getInt();
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		if (casualties > units) {
			alert("Větši ztráty jak počet jednotek");
			return;
		}
		if (casualties === units) {
			form.min_defence_output.value = 3*attack;
			form.max_defence_output.value = "inf";
			return;
		}
		form.min_defence_output.value = Math.floor((casualties/units)*3*attack);
		form.max_defence_output.value = Math.floor(((casualties+1)/units)*3*attack-1);
	};
};