// JavaScript Document
// DEScripts
// USES DB.Units

var unit_combinations = new function() {
	/***** PRIVATE *****/
	// Pads a number to fixed length
	var spaced = function(n) {
		var str = "" + n;
		while(str.length < 8)
			str = " " + str;
		return str;
	};

	/***** PUBLIC *****/
	// Generates new windov with combinations
	this.generate = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var strength = form.strength.getInt();
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		var race = form.race.getSelectedValue();
		var a1 = DB.Units[race][1].attack;
		var a2 = DB.Units[race][2].attack;
		var a3 = DB.Units[race][3].attack;
		var d1 = DB.Units[race][1].defence;
		var d2 = DB.Units[race][2].defence;
		var d3 = DB.Units[race][3].defence;
		var s1 = a1 + d1;
		var s2 = a2 + d2;
		var s3 = a3 + d3;
		if(strength > 20000 && !confirm("Pro výpočet kombinací celkové síly přes 20 000 je třeba hodně paměti i času, je pravděpodobné, že prohlížeč spadne, přesto pokračovat?")) {
			var min_attacks = [0,0];
			var max_attacks = [0,0];
			var min_defences = [0,0];
			var max_defences = [0,0];
			for(var s=1; s<=strength; s++) {
				min_attacks[s] = strength;
				max_attacks[s] = 0;
				min_defences[s] = strength;
				max_defences[s] = 0;
				if(s >= s1) {
					min_attacks[s] = Math.min(min_attacks[s], min_attacks[s-s1] + a1);
					max_attacks[s] = Math.max(max_attacks[s], max_attacks[s-s1] + a1);
					min_defences[s] = Math.min(min_defences[s], min_defences[s-s1] + d1);
					max_defences[s] = Math.max(max_defences[s], max_defences[s-s1] + d1);
				}
				if(s >= s2) {
					min_attacks[s] = Math.min(min_attacks[s], min_attacks[s-s2] + a2);
					max_attacks[s] = Math.max(max_attacks[s], max_attacks[s-s2] + a2);
					min_defences[s] = Math.min(min_defences[s], min_defences[s-s2] + d2);
					max_defences[s] = Math.max(max_defences[s], max_defences[s-s2] + d2);
				}
				if(s >= s3) {
					min_attacks[s] = Math.min(min_attacks[s], min_attacks[s-s3] + a3);
					max_attacks[s] = Math.max(max_attacks[s], max_attacks[s-s3] + a3);
					min_defences[s] = Math.min(min_defences[s], min_defences[s-s3] + d3);
					max_defences[s] = Math.max(max_defences[s], max_defences[s-s3] + d3);
				}
			}
			alert("útok\t\t" + min_attacks[strength] + " - " + max_attacks[strength] + "\n" +
			      "obrana\t" + min_defences[strength] + " - " + max_defences[strength]);
			return;
		}
		var min_attack = strength;
		var max_attack = 0;
		var min_defence = strength;
		var max_defence = 0;

		var max1 = Math.floor(strength/s1);
		var rows=0;
		var string="<pre>" + spaced("1. ") + spaced("2. ") + spaced("3. ") + " | " + spaced("útok") + spaced("obrana") + "\n";
		for(var u1=max1; u1+1; u1--) {
			for(var u2=Math.floor((strength-u1*s1)/s2); u2+1; u2--) {
				if(!((strength - u1*s1 - u2*s2)%s3)) {
					var u3 = Math.floor((strength - u1*s1 - u2*s2)/s3);
					var attack = u1*a1 + u2*a2 + u3*a3;
					min_attack = Math.min(min_attack, attack);
					max_attack = Math.max(max_attack, attack);
					var defence = u1*d1 + u2*d2 + u3*d3;
					min_defence = Math.min(min_defence, defence);
					max_defence = Math.max(max_defence, defence);
					string += spaced(u1) + spaced(u2) + spaced(u3) + " | " + spaced(attack) + spaced(defence) + "\n";
					rows++;
				}
			}
		}
		string += "\n" +
		          spaced("") + spaced("útok") + spaced(min_attack) + " - " + spaced(max_attack) + "\n" +
		          spaced("") + spaced("obrana") + spaced(min_defence) + " - " + spaced(max_defence) + "</pre>";
		if(rows) {
			if(rows > 100000
			 && !confirm("útok\t\t" + min_attack + " - " + max_attack + "\n" +
			             "obrana\t" + min_defence + " - " + max_defence + "\n\n" +
			             "Nalezeno " + rows + " různých kombinací, výpis může chvíli trvat, nebo může spadnout prohlížeč, přesto pokračovat?"))
				return;
			newwindow=window.open();
			newdocument=newwindow.document;
			newdocument.write(string);
			newdocument.close();
		} else {
			alert("Chybná síla země - nelze dosáhnout");
		}
	};
};
