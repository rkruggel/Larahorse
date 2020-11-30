# Larahorse

Inhalt

- [Allgemeines](#allgemeines)
- [Die vier Hauptgruppen](#dievierhauptgruppen)
  - [Personen](#personen)
  - [Tiere](#tiere)
  - [Gebäude](#gebaeude)
  - [Geräte](#geraete)
- [Der technische Aufbau](#dertechnischeaufbau)
  - [Die Datenbank](#diedatenbank)
  - [Die Datenbank Alternative](#diedatenbankalternative)
  - [Das Json in FIELDS](#dasjsoninfields)
- [Menüs](#menues)
  - [Allgemein](#menuesallgemein)



<a name=""/>






















<a name="allgemeines"/>

## Allgemeines

Larahorse ist ein Programm zur Verwaltung von Pferdeställem und 
Pferdestallbetrieben.

Copyright Roland Kruggel, August 2020
Alle Rechte Vorbehalten

Es werden folgende Teile verwaltet:

- Die Personen
- Die Tiere
- Die Gebäude





<a name="dievierhauptgruppen"/>

## Die vier Hauptgruppen 

<a name="personen"/>

### Die Personen

#### Allgemein

Personen sind Einsteller, Reitbeteiligungen, Pflegepersonen, aber 
auch Reitlerer, Trainer, Putz- und Mistpersonal. Des Weiteren gehören
Tierärzte, Physio- und Osteopathen etc., Hufschmiede und -pfleger dazu. 
Der/die Stallbetreiber gehören auch dazu.

Grundsätzlich ist es so, dass alle Personen die einen Zugang zm Stall und/oder 
Tier haben, hier verzeichnet sind.

Die Personen, ebenso wie die Tiere, gehören zu den Basisdaten. Jede Person
ist verbunden mit: 

- einem oder mehreren Tieren  
  - Ein Einsteller hat ein/mehrere Pferde
  - Ein Trainer trainiert ein/mehrere Pferde
  - Ein TA behandelt ein/mehrere Pferde
  - etc.
- einem oder mehrere Gebäude
  - Ein Einsteller darf in die Reithalle, Longierhalle, etc
  - etc.
- einer oder mehrere Personen
  - Ein Einsteller hat eine mehrere Freunde


<a name="tiere"/>

### Die Tiere

Die meisten Tiere, die sich in einem Pferdestall befinden, werden wohl 
Pferde sein. Aber es könne auch Esel, Lamas oder auch Hunde sein. Die 
Verwaltung ist immer die gleiche.

Die Tiere, ebenso wie die Personen, gehören zu den Basisdaten. Jedes Tier 
ist verbunden mit:

- einer oder mehrere Personen
  - Ein Pferd hat einen Schmied
  - Ein Pferd hat ein TA
  - Ein Pferd hat einen Trainer
  - etc.
- einem Ausbildungsplan
  - hier gibt es noch einen Querverweis zu einer Person, weil
  es ja uch noch einen Trainer dazu gibt.
- einem Pflegeplan
- einem Futterplan
- einem Weideplan
- einem Bewegungsplan


<a name="gebaeude"/>

### Die Gebäude

Zu den Gebäuden gehören neben Pferdeställen auch Reithallen, Reitplätze, 
Longierhallen auch Waschplätze, Putzplätze etc. und auch so etwas wie das 
Reiterstübchen. 

Die Plätze sind verknüpft mit Pferden und Personen.

<a name="geraete"/>

### Die Geräte

Geräte sind der Springparcurs, Stangen, Pilonen, etc. sowie Gerten, 
Stricke, Sättel (die nicht privat sind) ebenso der Trecker zum Platz 
abziehen und die Firmenfahrzeuge wie die Heckenschere und der Rasenmäher. 

<a name="dertechnischeaufbau"/>

## Der technische Aufbau

<a name="diedatenbank"/>

### Die Datenbank

Bei der Datenbank gehe ich andere Wege, wie es üblich ist. Alle Tabellen 
haben nur vier Felder. Es gibt die Felder ID, NAME, TYPE, DEPENDENCY, FIELDS und FIELDSMETA

**Feld: ID**  
Das Feld ID enthält für eden Datensatz einen eindeutige ID. Die ID wird 
vom DB-System automatisch erstellt. 

**Feld: NAME**  
Ein Sortierfeld und ein Feld auf dem ein Index liegt. Hiernach kann 
schnell gesucht werden.

**Feld: TYPE**  
Eine Typisierung des Feldes. Bspl.: Bei Tabelle Personen kann das Feld 
Einsteller, Tierarzt, Reitbeteiligung, Gärtner, etc. enthalten, bei 
Tabelle Tiere kann das Feld Pferde, Esel, Hunde etc. enthalten. Wie 
granular das aufgebaut wird bleibt jedem selbst überlassen. 

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



<a name="diedatenbankalternative"/>

### Die Datenbank Alternative

Der gesamte Part *Datenbank* kann auch mit einer MongoDB abgedeckt werden. Muss noch geprüft werden.


<a name="dasjsoninfields"/>

### Das Json in FIELDS

<pre>
{
  "meta" : {  
    "fieldtype"  : [ "string", "text", "number", 
                     "integer", "combo", "date" ]  
  },
  "config" : {
    "landsmann" : {
      "order"   : 2,
      "anzeige" : "Landsm.",
      "type"    : "string",
      "format"  : "",
      "default" : "deutscher"
    },
    "gehalt" : {
      "order"   : 8,
      "anzeige" : "Verdienst",
      "type"    : "number",
      "format"  : "",
      "default" : 122000.00
    },
    "anrede" : {
      "order"   : 4,
      "anzeige" : "Anrede",
      "type"    : "combo",
      "format"  : "Herr, Frau",
      "default" : "Herr"
    },
    "titel" : {
      "order"   : 6,
      "anzeige" : "Titel",
      "type"    : "combo",
      "format"  : "Dr., Prof., Prof. Dr., Prof. Dr. Dr.",
      "default" : ""
    },
    ...
  }
}
</pre>


So werden die Daten gespeichert.

<pre>
{
  "data" : {
    "landsmann" : {
      "gruppe" : "test",
      "value"   : null
    },
    "gehalt" : {
      "gruppe" : "test",
      "value"   : null
    },
    "anrede" : {
      "gruppe" : "test",
      "value"   : null
    },
    "titel" : {
      "gruppe" : "test",
      "value"   : null
    },
    ...
  }
}
</pre>


<a name="menues"/>

## Menüs

<a name="menuesallgemein"/>

#### Allgemein

Das Menü spiegelt die Daten-Tabellen der Datenbank wider. In unserem Fall sind
das drei Menüpunkte

- Personen
- Tiere
- Gebäude



Der Header enthält die Schaltleiste


