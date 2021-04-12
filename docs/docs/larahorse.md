---
title: Larahorse
summary: Copyright und Technik
authors:
    - Roland Kruggel
date: 2020-12-05
some_url: 
---

# Larahorse 

## Copyright
Author Roland Kruggel   
Copyright (c) Roland Kruggel, Aug. 2020, 2021
Alle Rechte vorbehalten

Larahorse steht unter der MIT-Lizenz.

## Install
Die Installation wird im Moment noch von uns händisch durchgeführt. Sie bekommen eine URL und ein Account. Mehr ist ja nicht nötig.

## Technik
Für die die es interessiert beschreibe ich hier die Technik die verwendet wird. Sie wird zwar nicht bis in kleinste
Detail beschrieben aber als Leitfaden ist sie tauglich.

**Hauptprogrammiersprache**   
Die gesamte App ist in PHP v7.4 geschrieben. Das schließt Html, Css und Javascript natürlich ein.

**Frameworks**  
Das Haupt-Framework ist Laravel.  
Zusätzliche Frameworks sind Livewire.

**Config**
Alle Config-Dateien werden im Yaml-Format erfasst. Der Vorteil ist das jedes Gültige Json auch ein gültiges yaml ist udn
das Kommentare eingefügt werden können. Ausserdem ist die definition der Felder wesentlich einfacher.

**Datenbank**  
Die Haupt-Datenbank ist MongoDb. Sie wurde gewählt, weil sie den Datentyp Json enthält und eine Schemalose speicherung
der Daten möglich ist.

**Customizing**  
Für das Customizing wird ein Porgrammierpart mit einer Api angeboten. Als Programmiersprache wird Lua v 5.4.0 verwendet.
Es ist eine Scriptsprache und sie lässt sich perfekt in PHP einbetten. Die Scripte können als Text in die DB gelegt
werden.

IDE: PHPStorm Dokusystem: Zettlr Datenbank: MongoDb DB-Viewer: Robo 3T



