<?php
$debug = FALSE;
error_reporting(E_ALL);

function toAscii($s) {
    $s = preg_replace('#[^\x09\x0A\x0D\x20-\x7E\xA0-\x{2FF}\x{370}-\x{10FFFF}]#u', '', $s);
    $s = strtr($s, '`\'"^~', "\x01\x02\x03\x04\x05");
    if (ICONV_IMPL === 'glibc') {
        $s = @iconv('UTF-8', 'WINDOWS-1250//TRANSLIT', $s); // intentionally @
        $s = strtr($s, "\xa5\xa3\xbc\x8c\xa7\x8a\xaa\x8d\x8f\x8e\xaf\xb9\xb3\xbe\x9c\x9a\xba\x9d\x9f\x9e"
            . "\xbf\xc0\xc1\xc2\xc3\xc4\xc5\xc6\xc7\xc8\xc9\xca\xcb\xcc\xcd\xce\xcf\xd0\xd1\xd2\xd3"
            . "\xd4\xd5\xd6\xd7\xd8\xd9\xda\xdb\xdc\xdd\xde\xdf\xe0\xe1\xe2\xe3\xe4\xe5\xe6\xe7\xe8"
            . "\xe9\xea\xeb\xec\xed\xee\xef\xf0\xf1\xf2\xf3\xf4\xf5\xf6\xf8\xf9\xfa\xfb\xfc\xfd\xfe\x96",
            "ALLSSSSTZZZallssstzzzRAAAALCCCEEEEIIDDNNOOOOxRUUUUYTsraaaalccceeeeiiddnnooooruuuuyt-");
    } else {
        $s = @iconv('UTF-8', 'ASCII//TRANSLIT', $s); // intentionally @
    }
    $s = str_replace(array('`', "'", '"', '^', '~'), '', $s);
    return strtr($s, "\x01\x02\x03\x04\x05", '`\'"^~');
}


$sets_map = array(
    "dwarf" => "trpaslík",
    "elf" => "elf",
    "knight" => "rytíř",
    "legionnaire" => "legionář",
    "mage" => "mág",
    "necromant" => "nekromant",
    "orc" => "skřet",
    "royal" => "královský set",
    "dark elf" => "dark elf",
    "squire" => "zbrojnoš",
    "silver dragon" => "stříbrný dračí set",
    "gold dragon" => "zlatý dračí set",
    "black dragon" => "Černý dračí set"
);

$special_map = array(
    "plast stesti" => 6,
    "pletronuv pohar" => 18,
    "rad celegorna" => 6,
    "hulka naginaty" => 6,
    "torgova hul" => 12,
    "remdih brcka" => 10,
    "dexterova packa" => 20,
    "zeliho smaragd" => 10,
    "pattonuv safir" => 10,
    "roderikovo kopi" => 6,
    "modra kuse" => 20,
    "saykovy vidle" => 10,
    "kronikarsky brk" => 1,
    "irsilova mandragora" => 6,
    "paprskova houba" => 8,
    "yakushiho mesec" => 6,
    "kronikarske brcko" => 1
);

$herofile = file_get_contents("https://www.darkelf.cz/artefacts_all.asp");

$doc = new DOMDocument();
$doc->loadHTML($herofile);

// id;name;type;set;attack_bonus;defence_bonus;attack;defence;spell_power;magical_defence;escape;survival;thieving;destruction;efficiency
print("id;name;type;set;attack_bonus;defence_bonus;attack;defence;spell_power;magical_defence;escape;survival;thieving;destruction;efficiency\n");
$output_table = array();

$imgs = $doc->getElementsByTagName("img");
foreach ($imgs as $img) {
    $imgsrc = $img->attributes->getNamedItem("src")->value;

    if(!preg_match("/images\/ar\/(.+)\.(jpg|png)/", $imgsrc, $m)) {
        continue;
    }
    $art_id = $m[1];
    
    if($debug)
        print($art_id . " - ");

    $imgtitle = $img->attributes->getNamedItem("title")->value;
    //print(" - " . $imgtitle);

    if(!preg_match("/(.+?)( \((.+)\))?: (.+)/", $imgtitle, $m2)) {
        continue;
    }
    //      0     1      2  3    4
    // $m2 [text, jméno, _, typ, atributy]
    //print_r($m2);

    $parrent = $img->parentNode->parentNode;
    $setdiv = $parrent->getElementsByTagName("div")[0];

    $position_number_map = array(
        1 => "coat",
        2 => "head",
        3 => "weapon",
        4 => "armor",
        5 => "ring",
        6 => "shield",
        7 => "pocket",
        8 => "shoes",
    );

    $position_name_map = array(
        "plášť" => "coat",
        "hlava" => "head",
        "zbraň" => "weapon",
        "brnění" => "armor",
        "prsten" => "ring",
        "štít" => "shield",
        "kapsa" => "pocket",
        "boty" => "shoes",
    );

    // Is special?
    if ($parrent->nodeName == "div") { // no
        // get set name from parrent
        $art_set = trim($setdiv->textContent);
        $art_set_english = array_search(strtolower($art_set), $sets_map);

        // parse artifact position from artid
        preg_match("/[a-z]+([0-9])/", $art_id, $m4);
        $pos_number = $m4[1];
        $pos_name = $position_number_map[$pos_number];
    } else { // yes
        //get pseudo set name from map
        $art_set = "Unikát";
        if(!array_key_exists(strtolower(toAscii($m2[1])), $special_map)) {
            continue;
        }
        $art_set_english = "special-" . $special_map[strtolower(toAscii($m2[1]))];

        // parse artifact position from czech name
        $pos_name = $position_name_map[$m2[3]];
    }
    if($debug)
        print($art_set . "(".$art_set_english.")");
    // 0            1            2    3         4  5  6  7   8  9  10  11  12  13   14
    // amulet smrti;Amulet smrti;ring;necromant;0; 0; 0; 10; 6; 0; 0;  0;  0;  10  ;0
    // 0  1    2    3   4            5             6      7       8           9               10     11       12       13          14
    // id;name;type;set;attack_bonus;defence_bonus;attack;defence;spell_power;magical_defence;escape;survival;thieving;destruction;efficiency
    $output_row = array("", "", "", "", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $output_row[1] = $m2[1];
    $output_row[0] = strtolower(toAscii($m2[1]));
    $output_row[3] = $art_set_english;
    $output_row[2] = $pos_name;

    $atribute_map = array(
        "útok" => 4,
        "obrana" => 5,
        "level útok" => 6,
        "level obrana" => 7,
        "level síla kouzla" => 8,
        "level mag. obrana" => 9,
        "level útěk" => 10,
        "level přežití" => 11,
        "level kradení" => 12,
        "level destrukce" => 13,
        "level bojeschopnost" => 14,
    );
    
    if($debug)
        print("\n");

    foreach(explode(",", $m2[4]) as $atribute) {
        $atribute_clean = trim($atribute);

        preg_match("/(.+) ([0-9+\-]+)%?/", $atribute_clean, $m3);

        $atribute_name = $m3[1];
        $atribute_value = intval($m3[2]);
        $atribute_number = $atribute_map[$atribute_name];

        if($debug)
            print($atribute_clean . " - " . $atribute_name . "(" . $atribute_number . ")" . " - " . $atribute_value . "\n");

        $output_row[$atribute_number] = $atribute_value;
    }

    print(implode(";", $output_row));
    print("\n");

    if($debug)
        print("\n");

}