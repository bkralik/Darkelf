// db.js (DEScripts by Ril)
var DB = new function() {

this.Units = new function() {
	var U = function(a, d) {
		this.attack = a;
		this.defence = d;
	};

	var RU = function(u1, u2, u3) {
		this[1] = u1;
		this[2] = u2;
		this[3] = u3;
	};

	this['men'] = new RU(new U(1,5), new U(7,3), new U(4,4));
	this['barbarians'] = new RU(new U(4,3), new U(9,3), new U(5,4));
	this['orcs'] = new RU(new U(2,4), new U(5,3), new U(3,3));
	this['uruks'] = new RU(new U(3,3), new U(7,1), new U(5,3));
	this['necromancers'] = new RU(new U(1,4), new U(7,2), new U(5,3));
	this['magi'] = new RU(new U(2,5), new U(7,2), new U(3,5));
	this['elves'] = new RU(new U(2,6), new U(6,4), new U(5,5));
	this['dark elves'] = new RU(new U(3,5), new U(7,3), new U(4,5));
	this['dwarves'] = new RU(new U(2,7), new U(5,6), new U(3,7));
	this['hobbits'] = new RU(new U(2,2), new U(4,2), new U(1,2));
	this['ents'] = new RU(new U(4,6), new U(8,8), new U(3,4));
};

this.Fortresses = new function() {
	var Fortress = function(a, d) {
		this.attack_bonus = a;
		this.defence_bonus = d;
	};

	this.without_fortress = new Fortress(1,1);
	this.wooden_walls = new Fortress(1,1.1);
};

this.Heroes = new function() {
	var S = function(b, e) {
		this.base_cost = b;
		this.exp_cost = e;
	};

	var HS = function(a, ae, def, defe, sp, spe, md, mde, es, ese, s, se, t, te, des, dese, ef, efe) {
		this.attack = new S(a, ae);
		this.defence = new S(def, defe);
		this.spell_power = new S (sp, spe);
		this.magical_defence = new S(md, mde);
		this.escape = new S(es, ese);
		this.survival = new S(s, se);
		this.thieving = new S(t, te);
		this.destruction = new S(des, dese);
		this.efficiency = new S(ef, efe);
	};

	this.mage =              new HS(350,3,   250,3.1, 520,4,   160,2,   170,2,   170,2,   130,2.4, 130,2.3, 1150,6);
	this.offensive_fighter = new HS(280,2.8, 210,2.9, 600,4.2, 200,2.8, 200,2.4, 150,2.4, 170,2.8, 120,1.8, 1200,5.3);
	this.defensive_fighter = new HS(300,2.9, 190,2.8, 600,4.2, 180,2.7, 210,2.4, 130,2.1, 180,2.9, 120,1.8,  920,4.4);
	this.fighter =           new HS(280,2.8, 220,3,   620,4.3, 220,2.8, 210,2.5, 160,2.4, 200,3,   200,3,    900,4);
	this.destroyer =         new HS(300,2.9, 230,2.9, 570,4.2, 200,2.8, 190,2.2, 120,1.8, 100,2.1, 100,1.6,  800,7);
	this.offensive_mage =    new HS(500,3.4, 390,3.4, 400,3.6, 120,1.8, 180,2.4, 220,2.7, 150,2.6, 140,2.1, 1100,5);
	this.defensive_mage =    new HS(500,3.3, 340,3.3, 450,3.8, 100,1.6, 150,2.4, 200,2.5, 140,2.4, 160,2.5, 1000,4.5);
	this.thief =             new HS(430,3.1, 300,3.1, 540,4,   170,2.2, 120,1.5, 120,1.6,  80,2,   170,2.2, 1100,5);
	this.novice_hero =       new HS(500,4,   400,4,   600,5,   220,3,   220,3,   220,3,   200,3,   200,3,   1300,6);
};

this.Artifacts = new function() {
	this.Repair_costs = new function() {
		this[''] = 0;
		this['squire'] = 1;
		this['orc'] = 1;
		this['legionnaire'] = 1;
		this['knight'] = 2;
		this['dwarf'] = 2;
		this['elf'] = 4;
		this['necromant'] = 8;
		this['mage'] = 8;
		this['dark elf'] = 16;
		this['royal'] = 16;
		this['special'] = 1; // kronikarsky brk
	};

	var A = function(ab, db, a, d, sp, md, es, s, t, des, ef, set) {
		this.attack_bonus = ab;
		this.defence_bonus = db;
		this.attack = a;
		this.defence = d;
		this.spell_power = sp;
		this.magical_defence = md;
		this.escape = es;
		this.survival = s;
		this.thieving = t;
		this.destruction = des;
		this.efficiency = ef;
		this.set = set;
	};

	this['nothing'] = new A(0,0,0,0,0,0,0,0,0,0,0,'');
	this['dratena plastenka'] = new A(0,3,0,3,0,0,0,0,0,0,0,'squire');
	this['vlci kozesina'] = new A(0,0,0,0,0,0,2,1,0,0,0,'orc');
	this['plast centuria'] = new A(0,2,0,0,0,0,0,3,0,0,0,'legionnaire');
	this['hedvabny plast'] = new A(0,2,0,0,0,10,0,0,0,0,0,'knight');
	this['hornicka plastenka'] = new A(0,0,0,0,0,5,0,3,0,0,0,'dwarf');
	this['plast z lorienu'] = new A(0,0,0,0,0,10,5,5,0,0,0,'elf');
	this['plast temnoty'] = new A(0,0,0,0,0,20,10,0,10,0,0,'necromant');
	this['cerveny plast'] = new A(0,0,0,0,0,22,10,10,0,0,0,'mage');
	this['plast mlhy'] = new A(0,0,0,0,0,30,10,0,16,0,0,'dark elf');
	this['hermelinovy plast'] = new A(0,20,0,8,0,20,0,0,0,0,0,'royal');
	this['zelezny klobouk'] = new A(0,1,0,0,0,0,0,2,0,0,0,'squire');
	this['skreti prilba'] = new A(0,1,0,0,0,0,0,0,0,0,0,'orc');
	this['prilba legionare'] = new A(0,5,0,0,0,0,0,2,0,0,0,'legionnaire');
	this['rytirska prilba'] = new A(0,6,0,0,0,0,0,4,0,0,0,'knight');
	this['trpaslici helma'] = new A(0,6,0,0,0,0,0,5,0,0,0,'dwarf');
	this['feanorova prilba'] = new A(0,8,0,3,0,0,0,3,0,0,0,'elf');
	this['helma nazgula'] = new A(0,20,0,0,0,0,0,5,0,0,2,'necromant');
	this['klobouk spicak'] = new A(0,10,0,0,0,10,0,0,0,0,2,'mage');
	this['koruna nadvlady'] = new A(0,12,0,0,6,0,0,0,0,0,3,'dark elf');
	this['svatovaclavska koruna'] = new A(0,0,2,0,0,0,0,12,20,0,0,'royal');
	this['zelezne kopi'] = new A(1,2,0,0,0,0,0,0,0,0,0,'squire');
	this['skreti savla'] = new A(1,0,0,0,0,0,0,0,0,0,0,'orc');
	this['gladius'] = new A(1,0,0,0,0,0,0,0,0,2,0,'legionnaire');
	this['rytirsky mec'] = new A(2,0,0,0,0,0,0,0,0,0,0,'knight');
	this['valecna sekera'] = new A(2,0,0,0,0,0,0,0,0,0,0,'dwarf');
	this['mec anduril'] = new A(3,0,2,0,0,0,0,0,0,0,0,'elf');
	this['angmarsky mec'] = new A(4,0,4,0,0,0,0,0,0,0,1,'necromant');
	this['angmarska hul'] = new A(3,0,0,0,12,0,0,0,0,0,1,'necromant');
	this['hul maga'] = new A(3,0,3,0,13,0,0,0,0,0,0,'mage');
	this['dark elfi hul'] = new A(5,0,5,0,14,0,0,0,0,0,0,'dark elf');
	this['mec krale vaclava'] = new A(4,30,4,0,0,0,0,0,0,0,0,'royal');
	this['lneny varkoc'] = new A(0,2,0,0,0,0,0,1,0,0,0,'squire');
	this['skreti zbroj'] = new A(0,5,0,0,0,0,0,0,0,0,0,'orc');
	this['legionarska zbroj'] = new A(0,4,0,1,0,0,0,0,0,0,0,'legionnaire');
	this['platova zbroj'] = new A(0,8,0,0,0,0,0,0,0,0,1,'knight');
	this['dratena kosile'] = new A(0,8,0,1,0,0,0,0,0,0,0,'dwarf');
	this['mithrilova zbroj'] = new A(0,14,0,0,0,6,0,6,0,0,0,'elf');
	this['cerna zbroj'] = new A(0,30,0,0,0,10,0,10,0,0,0,'necromant');
	this['modre roucho'] = new A(0,20,0,3,0,12,0,0,0,0,0,'mage');
	this['roucho dark elfa'] = new A(0,30,0,5,0,16,0,0,0,0,0,'dark elf');
	this['zbroj ceskeho lva'] = new A(0,36,0,4,0,0,0,20,0,0,0,'royal');
	this['mosazny prsten'] = new A(0,0,0,0,0,0,0,1,1,0,0,'squire');
	this['zelezny prsten'] = new A(0,0,0,0,0,0,0,0,0,0,1,'orc');
	this['rubinovy prsten'] = new A(0,0,0,0,1,1,0,0,0,0,0,'legionnaire');
	this['safirovy prsten'] = new A(0,0,0,0,2,0,0,0,0,0,0,'knight');
	this['smaragdovy prsten'] = new A(0,0,0,0,0,0,0,0,5,0,0,'dwarf');
	this['prsten nadeje'] = new A(0,0,0,0,3,0,10,0,0,0,2,'elf');
	this['amulet smrti'] = new A(0,0,0,10,6,0,0,0,0,10,0,'necromant');
	this['draci kamen'] = new A(0,0,0,0,8,12,0,0,0,0,1,'mage');
	this['jeden prsten'] = new A(0,0,0,0,16,0,0,10,0,12,0,'dark elf');
	this['zezlo'] = new A(0,0,0,0,15,15,0,0,0,20,0,'royal');
	this['dreveny stit'] = new A(0,8,0,0,0,0,0,0,0,0,0,'squire');
	this['skreti stit'] = new A(0,2,0,2,0,0,0,0,0,0,0,'orc');
	this['legionarsky stit'] = new A(0,10,0,0,0,0,0,0,0,0,0,'legionnaire');
	this['erbovni stit'] = new A(0,12,0,0,0,0,0,0,0,0,0,'knight');
	this['klanovy stit'] = new A(0,5,0,5,0,0,0,0,0,0,0,'dwarf');
	this['elfi stit'] = new A(0,10,0,4,0,10,0,0,0,0,0,'elf');
	this['stit smrtihlav'] = new A(0,30,0,10,0,10,0,0,0,0,0,'necromant');
	this['ochranny amulet'] = new A(0,20,0,12,0,20,0,0,0,0,0,'mage');
	this['ohnivy stit'] = new A(0,30,0,16,0,30,0,0,0,0,0,'dark elf');
	this['kralovske jablko'] = new A(0,0,0,0,9,0,0,20,0,0,4,'royal');
	this['ochranny pergamen'] = new A(0,0,0,0,1,5,0,0,0,0,0,'squire');
	this['lebka maga'] = new A(0,0,0,0,0,0,0,0,0,10,0,'orc');
	this['magicky svitek'] = new A(0,0,0,0,2,0,0,0,0,0,0,'legionnaire');
	this['kniha kouzel'] = new A(0,0,0,0,2,10,0,0,0,0,0,'knight');
	this['stela staresiny'] = new A(0,0,0,0,0,12,0,0,0,0,0,'dwarf');
	this['noldorsky luk'] = new A(1,0,1,0,0,0,0,0,0,0,0,'elf');
	this['kniha mrtvych'] = new A(0,0,0,0,8,10,0,0,0,10,0,'necromant');
	this['vestici koule'] = new A(0,0,0,0,4,0,12,0,12,0,0,'mage');
	this['palantyr moci'] = new A(0,0,0,0,0,0,16,16,16,0,0,'dark elf');
	this['kralovsky dekret'] = new A(1,0,2,0,0,15,0,0,0,0,0,'royal');
	this['kronikarsky brk'] = new A(3,30,3,0,0,0,0,0,0,0,0,'special');
	this['kozene boty'] = new A(0,0,0,0,0,0,2,2,0,0,0,'squire');
	this['skreti bagancata'] = new A(0,0,0,0,0,0,0,0,1,0,0,'orc');
	this['legionarske sandaly'] = new A(0,0,0,0,0,0,1,0,2,0,0,'legionnaire');
	this['zelezne obuti'] = new A(0,5,0,0,0,0,0,2,0,0,0,'knight');
	this['havirske boty'] = new A(0,2,0,0,0,0,0,0,0,1,0,'dwarf');
	this['zdobene body'] = new A(0,2,0,0,0,0,10,4,0,0,0,'elf');
	this['cerne holenice'] = new A(0,0,0,0,0,0,10,0,10,6,0,'necromant');
	this['boty z baziliska'] = new A(0,10,0,0,6,0,12,0,0,0,0,'mage');
	this['draci boty'] = new A(0,16,0,0,0,0,20,0,0,0,1,'dark elf');
	this['kralovske boty'] = new A(0,0,0,7,8,0,20,0,0,0,0,'royal');
};

};
