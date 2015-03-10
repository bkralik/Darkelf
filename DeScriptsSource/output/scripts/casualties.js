// JavaScript Document
// DEScripts

var casualties = new function() {
	/***** PRIVATE *****/
	/***** PUBLIC *****/
	// Reckon casualties
	this.reckonCasualties = function(form) {
		removeClassFromElements(form.getInputElements(), "error");
		try {
			var units = [0,0,0];
			for(var i=1; i<=3; i++)
				units[i-1] = eval("form.unit" + i).getInt(0);
			var attack = form.attack.getInt();
			if (attack === 0)
				throw new Exception("IllegalArgument","Nulový útok",form.attack);
			var defence = form.defence.getInt();
		} catch(e) {
			if(e instanceof Exception) {
				e.cause.addClass("error");
				alert(e.message);
			} else throw e;
			return;
		}
		if (defence >= 3*attack) {
			for(var i=1; i<=3; i++)
				eval("form.unit"+i+"casualties").value = units[i-1];
			return;
		}
		for(var i=1; i<=3; i++)
			eval("form.unit"+i+"casualties").value = Math.floor(units[i-1]*(defence/attack)/3);
	};
};