// JavaScript Document
// DEScripts
// Uses DB.Heroes

var hero = new function() {
	/***** PRIVATE *****/
	// Counts total cost of set skill
	var skillTotalCost = function(hero_type, skill, current_level, level) {
		var cost = 0;
		var base_cost = DB.Heroes[hero_type][skill].base_cost;
		var exp_cost = DB.Heroes[hero_type][skill].exp_cost;
		for(var e=0; e<level; e++) {
			cost += Math.floor(base_cost + Math.pow(current_level+e, exp_cost));
		}
		return cost;
	};

	/***** PUBLIC *****/
	// Updates total cost of skills
	this.updateTotalCost = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var current_attack = form.current_attack.getInt(0);
			var current_defence = form.current_defence.getInt(0);
			var current_spell_power = form.current_spell_power.getInt(0);
			var current_magical_defence = form.current_magical_defence.getInt(0);
			var current_escape = form.current_escape.getInt(0);
			var current_survival = form.current_survival.getInt(0);
			var current_thieving = form.current_thieving.getInt(0);
			var current_destruction = form.current_destruction.getInt(0);
			var current_efficiency = form.current_efficiency.getInt(0);
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		var hero_type = form.hero_type.getSelectedValue();
		var attack = parseInt(form.attack.value);
		var defence = parseInt(form.defence.value);
		var spell_power = parseInt(form.spell_power.value);
		var magical_defence = parseInt(form.magical_defence.value);
		var escape = parseInt(form.escape.value);
		var survival = parseInt(form.survival.value);
		var thieving = parseInt(form.thieving.value);
		var destruction = parseInt(form.destruction.value);
		var efficiency = parseInt(form.efficiency.value);

		var total_cost = 0;
		total_cost += skillTotalCost(hero_type, "attack", current_attack, attack);
		total_cost += skillTotalCost(hero_type, "defence", current_defence, defence);
		total_cost += skillTotalCost(hero_type, "spell_power", current_spell_power, spell_power);
		total_cost += skillTotalCost(hero_type, "magical_defence", current_magical_defence, magical_defence);
		total_cost += skillTotalCost(hero_type, "escape", current_escape, escape);
		total_cost += skillTotalCost(hero_type, "survival", current_survival, survival);
		total_cost += skillTotalCost(hero_type, "thieving", current_thieving, thieving);
		total_cost += skillTotalCost(hero_type, "destruction", current_destruction, destruction);
		total_cost += skillTotalCost(hero_type, "efficiency", current_efficiency, efficiency);
		form.total_cost.value = total_cost;
	};

	// Decrements set skill
	this.decrement = function(form, skill) {
		var value = parseInt(eval("form." + skill).value);
		if(value === 0) return;
		eval("form." + skill).value = value-1;
		this.updateTotalCost(form);
	};

	// Increments set skill
	this.increment = function(form, skill) {
		eval("form." + skill).value = parseInt(eval("form." + skill).value)+1;
		this.updateTotalCost(form);
	};
};