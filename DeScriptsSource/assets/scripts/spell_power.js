// JavaScript Document
// DEScripts

var spell_power = new function() {
	/***** PRIVATE *****/
	// Number of mage/land counts
	var counts = 1;

	// Counts spell_power_bonus from a table of magetowers and hero bonuses
	var countSpellPowerBonus = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		var lesser_magetower = form.lesser_magetower.getInt(0);
		var medium_magetower = form.medium_magetower.getInt(0);
		var large_magetower = form.large_magetower.getInt(0);
		var heroes_bonus = form.heroes_bonus.getInt(0);
		var others_heroes_bonus = form.others_heroes_bonus.getInt(0);

		var bonus = 0;
		bonus += 7*lesser_magetower;
		bonus += 10*medium_magetower;
		bonus += 20*large_magetower;
		bonus += heroes_bonus;
		bonus += others_heroes_bonus/2;
		return bonus;
	};

	/***** PUBLIC *****/
	// Counts spell power
	this.countSpellPower = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var land_count = form.total_land_count.getInt();
			if(land_count == 0)
				throw new Exception("IllegalArgument","Počet zemí nemůže být 0.",form.total_land_count);
			var spell_power=0;
			for(var i=1; i<=counts; i++)
				spell_power += eval("form.mage_count" + i).getInt(0) * eval("form.land_count" + i).getInt(1);
			var spell_power_bonus = form.spell_power_bonus.getFloat(countSpellPowerBonus(form));
			var pentagram_count = form.pentagram_count.getInt(0);
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		if(pentagram_count > land_count) {
			alert("Pentagramů je víc než zemí.");
			return;
		}
		spell_power = Math.floor(2*spell_power/land_count);
		spell_power *= 1+(spell_power_bonus/100);
		var min_spell_power = Math.floor(spell_power/3 + pentagram_count);
		var max_spell_power = Math.floor(spell_power + pentagram_count - 1); 
		form.min_spell_power_output.value = min_spell_power;
		form.max_spell_power_output.value = max_spell_power>=min_spell_power?max_spell_power:min_spell_power;
	};

	// Updates spell_power_bonus
	this.updateSpellPowerBonus = function(form) {
		try {
			form.spell_power_bonus.value = countSpellPowerBonus(form);
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
	};

	// Adds another row of mage/land counts
	this.addCounts = function(form) {
		counts++;
		var table = document.getElementById("spell_power-counts");
		var newRow = table.insertRow(table.rows.length);
		newRow.innerHTML = "<td><label><input name=\"mage_count" + counts + "\" size=\"3\" maxlength=\"5\" value=\"\"> mágů</label></td>\n" +
		                   "<td>v <label><input name=\"land_count" + counts + "\" size=\"3\" maxlength=\"3\" value=\"\"> zemích</label></td>\n";
	};
};
