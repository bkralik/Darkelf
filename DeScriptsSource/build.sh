#!/bin/bash
php descripts.php > output/index.html
php updates.php > output/updates.html
php scripts/db.php > output/scripts/db.js
rm -rf ../descripts/*
cp output/* ../descripts -r
