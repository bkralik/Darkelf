// JavaScript Document
// DEScripts
// Uses DB.Artifacts

var artifacts = new function() {
	/***** PRIVATE *****/
	var artifacts = new function() {
		this.coat = DB.Artifacts['nothing'];
		this.head = DB.Artifacts['nothing'];
		this.weapon = DB.Artifacts['nothing'];
		this.armor = DB.Artifacts['nothing'];
		this.ring = DB.Artifacts['nothing'];
		this.shield = DB.Artifacts['nothing'];
		this.pocket = DB.Artifacts['nothing'];
		this.shoes = DB.Artifacts['nothing'];
	};

	var resetArtifacts = function() {
		artifacts['coat'] = DB.Artifacts['nothing'];
		artifacts['head'] = DB.Artifacts['nothing'];
		artifacts['weapon'] = DB.Artifacts['nothing'];
		artifacts['armor'] = DB.Artifacts['nothing'];
		artifacts['ring'] = DB.Artifacts['nothing'];
		artifacts['shield'] = DB.Artifacts['nothing'];
		artifacts['pocket'] = DB.Artifacts['nothing'];
		artifacts['shoes'] = DB.Artifacts['nothing'];
	};

	/***** PUBLIC *****/
	// EVENT FUNCTION
	this.update = function(form, item) {
		artifacts[item] = DB.Artifacts[form[item].getSelectedValue()];
		
		form[item + "_attack_bonus"].value = artifacts[item].attack_bonus;
		form[item + "_defence_bonus"].value = artifacts[item].defence_bonus;
		form[item + "_attack"].value = artifacts[item].attack;
		form[item + "_defence"].value = artifacts[item].defence;
		form[item + "_spell_power"].value = artifacts[item].spell_power;
		form[item + "_magical_defence"].value = artifacts[item].magical_defence;
		form[item + "_escape"].value = artifacts[item].escape;
		form[item + "_survival"].value = artifacts[item].survival;
		form[item + "_thieving"].value = artifacts[item].thieving;
		form[item + "_destruction"].value = artifacts[item].destruction;
		form[item + "_efficiency"].value = artifacts[item].efficiency;
		form[item + "_repair_cost"].value = DB.Artifacts.Repair_costs[artifacts[item].set];

		var attack_bonus = 0;
		var defence_bonus = 0;
		var attack = 0;
		var defence = 0;
		var spell_power = 0;
		var magical_defence = 0;
		var escape = 0;
		var survival = 0;
		var thieving = 0;
		var destruction = 0;
		var efficiency = 0;
		var repair_cost = 0;

		var is_full_set = true;
		var set_name = artifacts[item].set;
		for(var i in artifacts) {
			if(artifacts[i].set === "" || artifacts[i].set !== set_name)
				is_full_set = false;
		}

		for(var i in artifacts) {
			if(parseInt(artifacts[i].attack_bonus))
				attack_bonus += parseInt(artifacts[i].attack_bonus) + (is_full_set?1:0);
			if(parseInt(artifacts[i].defence_bonus))
				defence_bonus += parseInt(artifacts[i].defence_bonus) + (is_full_set?1:0);
			if(parseInt(artifacts[i].attack))
				attack += parseInt(artifacts[i].attack) + (is_full_set?1:0);
			if(parseInt(artifacts[i].defence))
				defence += parseInt(artifacts[i].defence) + (is_full_set?1:0);
			if(parseInt(artifacts[i].spell_power))
				spell_power += parseInt(artifacts[i].spell_power) + (is_full_set?1:0);
			if(parseInt(artifacts[i].magical_defence))
				magical_defence += parseInt(artifacts[i].magical_defence) + (is_full_set?1:0);
			if(parseInt(artifacts[i].escape))
				escape += parseInt(artifacts[i].escape) + (is_full_set?1:0);
			if(parseInt(artifacts[i].survival))
				survival += parseInt(artifacts[i].survival) + (is_full_set?1:0);
			if(parseInt(artifacts[i].thieving))
				thieving += parseInt(artifacts[i].thieving) + (is_full_set?1:0);
			if(parseInt(artifacts[i].destruction))
				destruction += parseInt(artifacts[i].destruction) + (is_full_set?1:0);
			if(parseInt(artifacts[i].efficiency))
				efficiency += parseInt(artifacts[i].efficiency) + (is_full_set?1:0);
			repair_cost += parseInt(DB.Artifacts.Repair_costs[artifacts[i].set]);
		}
		
		form["total_attack_bonus"].value = attack_bonus;
		form["total_defence_bonus"].value = defence_bonus;
		form["total_attack"].value = attack;
		form["total_defence"].value = defence;
		form["total_spell_power"].value = spell_power;
		form["total_magical_defence"].value = magical_defence;
		form["total_escape"].value = escape;
		form["total_survival"].value = survival;
		form["total_thieving"].value = thieving;
		form["total_destruction"].value = destruction;
		form["total_efficiency"].value = efficiency;
		form["total_repair_cost"].value = repair_cost;
	};
	
	this.resetForm = function(form) {
		resetArtifacts();
		form.clearErrors();
	};
};