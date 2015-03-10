# Darkelf utility

Repozitář obsahující různé užitečné utility k webové hře DarkElf.cz

### DeScripts

Legendární online výpočtová kalkulačka, programovaná odjakživa hráčem [Ril](http://www.darkelf.cz/ch/posta.asp?forum_hrac=218459) z klanu Asasini. Od doby, co byl zrušen hosting asasini.own.cz jsou descripts hostovány na [darkelf.bkralik.cz](http://darkelf.bkralik.cz).

Aktuální javascriptová verze se generuje z PHP zdrojových souborů skriptem build.sh. Pro ruční build do složky output stačí spustit
```bash
php descripts.php > output/index.html
php updates.php > output/updates.html
php scripts/db.php > output/scripts/db.js
```

### InfoLoader

Pokusný skript sloužící k ukládání informace o všech zemích do databáze. Rozpracovaná a nehotová verze


© 2009-2013 Ril, 2015- bkralik