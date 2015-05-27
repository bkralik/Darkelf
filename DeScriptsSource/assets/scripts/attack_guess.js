// JavaScript Document
// DEScripts

var attack_guess = new function() {
	/***** PRIVATE *****/
	/***** PUBLIC *****/
	// Guess attack
	this.guessAttack = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var defence = form.defence.getInt();
			var units = form.units.getInt();
			if (units === 0)
				throw new Exception("IllegalArgument","Nulový počet jednotek - nelze nic spočítat",form.units);
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
			form.min_attack_output.value = defence;
			form.max_attack_output.value = "inf";
			return;
		}
		if (6*casualties >= units) {
			alert("Takovéto ztráty nemohou nastat");
			return;
		}
		form.min_attack_output.value = Math.floor((casualties/units)*6*defence);
		form.max_attack_output.value = Math.min(Math.floor(((casualties+1)/units)*6*defence-1), defence-1);
	};
};