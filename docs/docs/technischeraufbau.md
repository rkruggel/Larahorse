---
title: Technischer Aufbau
summary: Hier wird der technische Aufbau beschrieben
authors:
    - Roland Kruggel
date: 2020-12-05
some_url: 
---

# Technischer Aufbau
Hier beschreiben wir den technischen Aufbau von Larahorse. Es kann sein, dass es etwas technisch wird. Ich habe diesen Teil geschrieben um auch für mich einen Leitfade zur Programmierung zu haben. 

Der technische Aufbau ist wichtig zu verstehen um Larahorse effektiv Nutzen zu können. Hier werden auch Fachbegriffe erleutert die in den anderen Seiten benutzt werden.

## Der Screen
Der Hauptscreen besteht aus nur vier Teilen.

- **Das Hauptmenu**.   
Es ist an dem oberen Rand des Bildschirmes. Hier befindet sich ein Login, je ein Startknopf für die einzelnen Apps, in unserem Fall ist es die Beispielapp *Stall*, und einige wenig Adminmenüs. Die Adminmenüs sind jedoch Userabhängig.
- **Das Seitenmenü**.   
Es befindet sich auf der linken Seite.  Es wird angezeigt wenn im Hauptmenu eine App ausgewählt wird. Hier sind die einzelnen Tabellen aufgelistet. Dieser Bereich wird vom Benutzer erstellt. Wenn eine neue Tabelle erzeugt wird, wird sie hier eingetragen und angezeigt.
- **Der Mainscreen**.   
Der restliche Screen wird von dem Anzeigebereich der Tabellenseiten eingenommen. Hier werden die einzelnen Seiten mit ihren Attribunten und Such- und Änderungemenüs angezeigt.
- **Die Dialogfenster**   
Wenn auf einen Link oder ein Button geklickt wird und weitere Daten angezeigt, eingegeben oder bearbeitet werden müssen, wirden diese in einem Dialogfenster eingeblendet. Es legt sich über ein Teil des aktuellen Screens und verschwindet wieder wenn die entsprechende Aktion abgeschlossen ist.

Da *Larahorse* eine Datengetriebene App ist, dreht sich alles um Daten. Bei der Installation von *Stall* ist schon eine Datenbank erstellt worden. Jetzt mussen sie nur noch mit vernünftigen Daten gefüttert werden.

## Die Steuerung

### Felder, Buttons und Co.
Alle Felder, Buttons, Links und Co können angeklickt werden. Wenn dieses, aus programmtechnischen Gründen, nicht möglich sein sollte, sind sie ausgegraut. Sie sind also nicht anwählbar, aber vorhanden. Es gibt also keine Elemente die auf einmal erscheinen oder verschwinden. Es wird immer alles angezeigt. 

Einzige Ausnahme: Felder werden absichtlich vom Anwender ausgeblendet.

### Speichern und Abbrechen
Ja, es gibt sie noch. Die *Speichern* und *Abbrechen* Buttons. In vielen anwendungen sind diese Buttons abgeschaft. Man braucht nicht mehr zu speichern. Es geht automatisch. Das ist praktisch. Aber was ist wenn man die gemachten Änderungen oder Eintragungen nicht speichern will. *Abbrechen* gibt es nicht mehr. Jetzt ist es geschehen, und viel schlimmer, das alte ist weg.

Ich hielt das für nicht gut. Deshalb muss der Anwender expliziet auf den Button *Speichern* klicken. Wenn er dieses will.

### Die Schaltleiste
Die Schaltleiste ist ein extrem wichtiges und Leistungsstarkes Teil des gesamten Applikation. Sie dient fast zur alleinigen Steuerung des gesamten *Larahorse*.

Die Schaltleiste befindet sich im Seitenmenu, im Mainscreen und in jedem Dialogfenster. Sie dient zur Steuerung der einzelnen Aktionen, die in diesem Fenster möglich sind. Manche Elemente sind gleich, viele Elemente sind jedoch speziell für das entsprechende Fenster.

Die Schaltleiste wird ausschließlich mit der linken Maustaste bedient.

### Das Contextmenü
Ich weis nicht ob ich so etwas haben will. Ich glabe eher nicht. Es kann von Handy's und Tablet's nicht genutzt werden.





## Die Datenbank
Bei der Datenbank gehe ich andere Wege wie es üblich ist. Der 'alte Weg' wäre eine SQL-Datenbank, wie z.B. Mysql. Das Problem ist nur, wir haben wechselde Tabellenspalten. Das ist mit einer SQL-Datenbank nur schwehr um zu setzen. Eine alternative wäre eine NoSQL Datenbank, wie z.B. MongoDB. Dort kännen die Spalten frei definiert werden. Allerdings sind viele Provider auf eine SQL-Datenbank fixiert. Eine kleine Zwickmühle.

Ich habe dieses Problem mit `Relationales-Json` gelöst. Es handelt sich dabei um eine Relationale Datenbank in der die Nutzdaten in einem Json-Feld gespeichert werden. Wir verwenden Postgresql. Sie hat einen Feldtype Json, der auch mit Sql-Befehlen durchsucht werden kann.

Ich beschreibe sowohl die Tabellen einer Sql-Datenbank (Postgresql) als auch einer NoSql Datenbank (MongoDb)

### Tabellen technisch (Sql)
Alle Tabellen, die für die Datenhaltung der Apps benötigt werden, haben nur vier Felder. Es gibt die Felder ID, NAME, TYPE, DEPENDENCY, FIELDS und FIELDSMETA

**Feld: ID**  
Das Feld ID enthält für eden Datensatz einen eindeutige ID. Die ID wird vom DB-System automatisch erstellt. 

**Feld: NAME**  
Ein Sortierfeld und ein Feld auf dem ein Index liegt. Hiernach kann schnell gesucht werden.

**Feld: TYPE**  
Eine Typisierung des Feldes. Bspl.: Bei Tabelle Personen kann das Feld Einsteller, Tierarzt, Reitbeteiligung, Gärtner, etc. enthalten, bei Tabelle Tiere kann das Feld Pferde, Esel, Hunde etc. enthalten. Wie granular das aufgebaut wird bleibt jedem selbst überlassen. 

**Feld: DEPENDENCY**  
Hier werden Abhängikkeiten definiert. Z.B. Eine Person hat eine 
Abhängigkeit zu Tieren. Ein Tier hat also immer einen Besitzer.

**Feld: FIELDS**  
Dieses ist das eigentliche Datenfeld. Es enthält ein Datenpart im Jsonformat.
Damit besteht die Möglichkeit, dass die Daten für verschiedene Typen unterschiedlich sind.
Z.B. in der Tabelle Personen sind die Daten für einen Einsteller andere wie für einen Tierarzt
und in der Tabelle Tiere gibt es für ein Pferd eine Lebensnummer, für einen Hund jedoch nicht.

**Feld: FIELDSMETA**  
Da es viele verschiedene Fields-Formate gibt, werden diese hier aufgelistet. Das hat den Vorteil, dass 
eine gewisse Einheitlichkeit erzeugt werden kann.


### Das Json in FIELDS

```json
{   
  "meta" : {    
    "fieldtype" : [ "string", "text", "number", 
                    "integer", "combo", "date" ]  
  },
  "config" : {
    "landsmann" : {
      "order"     : 2,
      "aktive"    : true,
      "anzeige"   : "Landsm.",
      "type"      : "string",
      "format"    : [ ],
      "default"   : "deutscher"
    },
    "gehalt" : {
      "order"   : 8,
      "aktive"    : true,
      "anzeige"   : "Verdienst",
      "type"      : "number",
      "format"    : [ ],
      "default"   : 122000.00
    },
    "anrede" : {
      "order"   : 4,
      "aktive"    : true,
      "anzeige"   : "Anrede",
      "type"      : "combo",
      "format"    : ["Herr", "Frau", "Firma"],
      "default"   : "Herr"
    },
    "titel" : {
      "order"   : 6,
      "aktive"    : true,
      "anzeige"   : "Titel",
      "type"      : "combo",
      "format"    : ["Dr.", "Prof.", "Prof. Dr.", 
                     "Prof. Dr. Dr."],
      "default"   : ""
    },
    ...
  }
}
```

#### meta -> fieldtype

```json
{
  "meta" : {
    "fieldtype" : [ "string", "text", "number", "date", 
                    "combobox", "ratio", "checkbox" ]
  }
```
Die `fieldtype` legt fest welche Typ die Felder haben dürfen.

- **string**   
Ein einfacher Text. Der Text darf nur einzeilig sein. Als Eingabefeld wird ein einzeiliges `<input type="text" />` genommen.
- **text**   
Ein mehrzeiliger Text. Er darf mehrzeilig sein und enthält einen editor.
- **number**   
Ein Zahlenfeld mit und ohne Dezimalzeichen. `<input type="number" />`
- **date**   
Ein Feld für Datum eingaben. `<input type="date" />`
- **combobox**  
Eine Combobox. `<select>...</select>`
- **radio**  
Eine Aufzählung. `<input type="ratio" />`
- **checkbox**  
Eine Checkbox. `<input type="checkbox" />`


#### config -> landsmann

```json
  "config" : {
    "landsmann" : {
      "order"     : 2,
      "aktive"    : true,
      "gruppe"    : "haupt",
      "anzeige"   : "Landsm.",
      "type"      : "string",
      "format"    : [ ],
      "default"   : "deutscher"
    },
```

- **landsmann** ist der Name des Feldes. 
    - **order** Integer. Gibt den  Wert an, der die Reihenfolge der Anzeige angibt. Bspl.: 2
    - **aktive** Boolean. Zeigt an ob das Feld überhaubt angezeigt werden soll. Bspl.: true
    - **gruppe** String. Fasst eingaben zusammen. Bsp.: haupt
    - **anzeige** String. Zeigt den Wert an der Angezeigt werden soll. Bspl.: Landsm.
    - **type** String. Zeigt einen Wert aus `meta -> fieldtype` Bspl.: string
    - **format** Array of string. Die Formatangabe ist abhängig vom `type`   Bspl.: [ ]
    - **default** String. Dieser Wert wird als defaultwert angezeigt.   Bspl.: deutscher

Das Feld `format` hat einen vielfältige info. Er ist abhängig von dem feld `type`. Es werden grundsetzlich die Formatierungszeichen von PHP genommen. 

**string** Die üblichen PHP-Formatzeichen.   
**text** Die üblichen PHP-Formatzeichen.  
**number** Die üblichen PHP-Formatzeichen.    
**date** Die üblichen PHP-Formatzeichen.  
**combobox** Eine Liste von Einträgen.  
**ratio** keine.  
**checkbox** keine.  


So werden die Daten gespeichert.

```json
{
  "data" : {
    "landsmann" : { 
        "gruppe" : "test", 
        "value" : null 
    },
    "gehalt" : { 
        "gruppe" : "test", 
        "value" : null 
    },
    "anrede" : { 
        "gruppe" : "test", 
        "value" : null 
    },
    "titel" : { 
        "gruppe" : "test", 
        "value" : null 
    },
    ...
  }
}
```

Jeder Datensatz der SQL-Tabelle enthält diese Json-Daten als Nutzdaten.


### Tabellen technisch (NoSql)
Alle Tabellen, die für die Datenhaltung der Apps benötigt werden, haben nur vier Felder. Es gibt die Felder ID, NAME, TYPE, DEPENDENCY, FIELDS und FIELDSMETA

**Feld: ID**  
Das Feld ID enthält für eden Datensatz einen eindeutige ID. Die ID wird vom DB-System automatisch erstellt. 

**Feld: NAME**  
Ein Sortierfeld und ein Feld auf dem ein Index liegt. Hiernach kann schnell gesucht werden.

**Feld: TYPE**  
Eine Typisierung des Feldes. Bspl.: Bei Tabelle Personen kann das Feld Einsteller, Tierarzt, Reitbeteiligung, Gärtner, etc. enthalten, bei Tabelle Tiere kann das Feld Pferde, Esel, Hunde etc. enthalten. Wie granular das aufgebaut wird bleibt jedem selbst überlassen. 

**Feld: DEPENDENCY**  
Hier werden Abhängikkeiten definiert. Z.B. Eine Person hat eine 
Abhängigkeit zu Tieren. Ein Tier hat also immer einen Besitzer.

**Feld: FIELDS**  
Dieses ist das eigentliche Datenfeld. Es enthält ein Datenpart im Jsonformat.
Damit besteht die Möglichkeit, dass die Daten für verschiedene Typen unterschiedlich sind.
Z.B. in der Tabelle Personen sind die Daten für einen Einsteller andere wie für einen Tierarzt
und in der Tabelle Tiere gibt es für ein Pferd eine Lebensnummer, für einen Hund jedoch nicht.

**Feld: FIELDSMETA**  
Da es viele verschiedene Fields-Formate gibt, werden diese hier aufgelistet. Das hat den Vorteil, dass 
eine gewisse Einheitlichkeit erzeugt werden kann.




### Das Json in FIELDS

```json
{   
  "meta" : {    
    "fieldtype" : [ "string", "text", "number", 
                    "integer", "combo", "date" ]  
  },
  "config" : {
    "landsmann" : {
      "order"     : 2,
      "anzeige"   : "Landsm.",
      "type"      : "string",
      "format"    : "",
      "default"   : "deutscher"
    },
    "gehalt" : {
      "order"   : 8,
      "anzeige"   : "Verdienst",
      "type"      : "number",
      "format"    : "",
      "default"   : 122000.00
    },
    "anrede" : {
      "order"   : 4,
      "anzeige"   : "Anrede",
      "type"      : "combo",
      "format"    : "Herr, Frau",
      "default"   : "Herr"
    },
    "titel" : {
      "order"   : 6,
      "anzeige"   : "Titel",
      "type"      : "combo",
      "format"    : "Dr., Prof., Prof. Dr., Prof. Dr. Dr.",
      "default"   : ""
    },
    ...
  }
}
```


So werden die Daten gespeichert.

```json
{
  "data" : {
    "landsmann" : { "gruppe":"test", "value":null },
    "gehalt" : { "gruppe":"test", "value":null },
    "anrede" : { "gruppe":"test", "value":null },
    "titel" : { "gruppe":"test", "value":null },
    ...
  }
}
```


###  laravel-livewire-forms

composer require kdion4891/laravel-livewire-forms

Publishing the form view files:

    php artisan vendor:publish --tag=form-views

Publishing the config file:

    php artisan vendor:publish --tag=form-config

<pre>
roland@roland-desktop:~/Develop/Larahorse$ php artisan vendor:publish --tag=form-views
Copied Directory [/vendor/kdion4891/laravel-livewire-forms/resources/views] To [/resources/views/vendor/laravel-livewire-forms]
Publishing complete.

roland@roland-desktop:~/Develop/Larahorse$ php artisan vendor:publish --tag=form-config
Copied File [/vendor/kdion4891/laravel-livewire-forms/config/laravel-livewire-forms.php] To [/config/laravel-livewire-forms.php]
Publishing complete.
</pre>

###  laravel-livewire-tables

Publishing the table view files:

    php artisan vendor:publish --tag=table-views

Publishing the config file:

    php artisan vendor:publish --tag=table-config

<pre>
roland@roland-desktop:~/Develop/Larahorse$ php artisan vendor:publish --tag=table-views
Copied Directory [/vendor/kdion4891/laravel-livewire-tables/resources/views] To [/resources/views/vendor/laravel-livewire-tables]
Publishing complete.
roland@roland-desktop:~/Develop/Larahorse$ php artisan vendor:publish --tag=table-config
Copied File [/vendor/kdion4891/laravel-livewire-tables/config/laravel-livewire-tables.php] To [/config/laravel-livewire-tables.php]
Publishing complete.
</pre>
