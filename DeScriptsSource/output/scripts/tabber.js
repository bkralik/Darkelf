// JavaScript Document
// DEScripts

var Tabber = new function() {
	var tabber = null;
	var tabs = new Array();
	var menus = new Array();
	var active = 0;

	// Initializing
	this.initialize = function() {
		var preselected_tab = location.hash.substr(1);
		tabber = document.getElementById("tabber");
		var childNodes = tabber.childNodes;
		for(i=0; i<childNodes.length; i++) {
			if(childNodes[i].nodeName === "DIV" && childNodes[i].hasClass("tabber_tab")) {
				tabs.push(childNodes[i]);
				if(childNodes[i].id === preselected_tab)
					active = tabs.length-1;
			}
		}
		if(tabs.length > 0) {
			var menu_ul = document.createElement("ul");
			menu_ul.className = "tabber_menu";
			var string = "";
			for(var i=0; i<tabs.length; i++) {
				string += "<li class='" + (i === active?"tabber_active":"tabber_inactive") + "'>" +
				          "<a href='#" + tabs[i].id + "' onclick='Tabber.switchTab(" + i + ")'>" +
				          tabs[i].title.replace(" ","&nbsp;") +
				          "</a>" +
				          "</li><wbr>";
				tabs[i].addClass(i === active?"tabber_active":"tabber_inactive");
				tabs[i].title = "";
			}
			menu_ul.innerHTML = string;
			tabber.insertBefore(menu_ul, tabber.firstChild);

			for(i=0; i<childNodes[0].childNodes.length; i++)
				if(childNodes[0].childNodes[i].nodeName === "LI")
					menus.push(childNodes[0].childNodes[i]);
		}
		// apply CSS style
		tabber.addClass("tabber");
	};

	this.switchTab = function(tab_index) {
		if(tab_index == active)
			return;
		tabs[active].removeClass("tabber_active");
		tabs[active].addClass("tabber_inactive");
		menus[active].removeClass("tabber_active");
		menus[active].addClass("tabber_inactive");
		active = tab_index;
		tabs[active].removeClass("tabber_inactive");
		tabs[active].addClass("tabber_active");
		menus[active].removeClass("tabber_inactive");
		menus[active].addClass("tabber_active");
	};
};

registerOnLoadFunction(Tabber.initialize);
