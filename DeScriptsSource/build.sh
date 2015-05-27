#!/bin/bash
mkdir -p output/scripts
php descripts.php > output/index.html
php updates.php > output/updates.html
php scripts/db.php > output/scripts/db.js
rm -rf ../descripts/*
cp assets/* ../descripts -r
cp output/* ../descripts -r
rm -rf ./output
