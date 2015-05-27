// JavaScript Document
// DEScripts

var growth = new function() {
	/***** PRIVATE *****/
	// Returns the multiplier
	var getGrowthRate = function(form) {
		for(var i=0; i<form.growth_rate.length; i++) {
			if(form.growth_rate[i].checked)
				return parseFloat(form.growth_rate[i].value);
		}
		alert("Není zvolena spokojenost obyvatel.");
		return 0; // Unexpected input
	};

	// Simulates population growth in one turn
	// Returns new inhabitants count
	var oneTurnGrowth = function(inhabitants, growth_rate, granary) {
		var growth = Math.floor(inhabitants/10) + 2;
		if(granary) growth += 4;
		growth = Math.floor(growth * growth_rate/2);
		return growth;
	};

	/***** PUBLIC *****/
	// Simulates population growth in all turns
	this.allTurns = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var inhabitants = form.inhabitants.getInt();
			var turns = form.turns.getInt();
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		var growth_rate = getGrowthRate(form);
		var granary = form.granary.checked;
		for(var i=0;i<turns;i++)
			inhabitants += oneTurnGrowth(inhabitants, growth_rate, granary);
		form.inhabitants_output.value = inhabitants;
		form.turns_output.value = turns;
	};

	// Counts number of turns needed to get demanded population
	this.neededTurns = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var inhabitants = form.inhabitants.getInt();
			var demanded_inhabitants = form.demanded_inhabitants.getInt();
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		var growth_rate = getGrowthRate(form);
		var granary = form.granary.checked;
		var turns = 0;
		if(inhabitants === oneTurnGrowth(inhabitants, growth_rate, granary)) {
			alert("Obyvatelé nepřibývají.");
			return;
		}
		while(inhabitants < demanded_inhabitants) {
			inhabitants += oneTurnGrowth(inhabitants, growth_rate, granary);
			turns++;
		}
		form.inhabitants_output.value = inhabitants;
		form.turns_output.value = turns;
	};
};