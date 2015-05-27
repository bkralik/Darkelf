#!/bin/bash
rm -rf ./output
mkdir output
mkdir output/scripts
php descripts.php > output/index.html
php updates.php > output/updates.html
php scripts/db.php > output/scripts/db.js
rm -rf ../descripts/*
mkdir ../descripts
cp assets/* ../descripts -r
cp output/* ../descripts -r
