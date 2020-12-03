# Larahorse-planning-old

Inhalt

- [Allgemeines](#allgemeines)
- [Die vier Hauptgruppen](#die-vier-hauptgruppen)
  - [Die Personen](#die-personen)
  - [Die Tiere](#die-tiere)
  - [Die Gebäude](#die-gebäude)
  - [Die Geräte](#die-geräte)
- [Menüs](#menüs)
  - [Allgemein](#allgemein-1)
  - [Die Schaltleiste](#die-schaltleiste)
- [Der technische Aufbau](#der-technische-aufbau)
  - [Die Datenbank](#die-datenbank)
  - [Die Datenbank Alternative](#die-datenbank-alternative)
  - [Das Json in FIELDS](#das-json-in-fields)
  
 





## Allgemeines


Es werden folgende Teile verwaltet:

- Die Personen
- Die Tiere
- Die Gebäude






## Die vier Hauptgruppen 

### Die Personen
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



### Die Gebäude
Zu den Gebäuden gehören neben Pferdeställen auch Reithallen, Reitplätze, 
Longierhallen auch Waschplätze, Putzplätze etc. und auch so etwas wie das 
Reiterstübchen. 

Die Plätze sind verknüpft mit Pferden und Personen.


### Die Geräte
Geräte sind der Springparcurs, Stangen, Pilonen, etc. sowie Gerten, 
Stricke, Sättel (die nicht privat sind) ebenso der Trecker zum Platz 
abziehen und die Firmenfahrzeuge wie die Heckenschere und der Rasenmäher. 



## Menüs

Das Menü spiegelt die Daten-Tabellen der Datenbank wider. In unserem Fall sind
das drei Menüpunkte

- Personen
- Tiere
- Gebäude


Der Header enthält die [Schaltleiste](#dieschaltleiste). Hier kann man neue Tabellen 
erzeugen. Die Eintragung in das Menü erfolgt dann automatisch.

Beim Erzeugen einer neuen Tabelle werden folgende Aktionen ausgeführt:

**Die Tabelle**   
Es wird die Tabelle mit dem angegebenen Namen erzeugt. Sie enthält die 
Felder  ID(int), NAME(string), TYPE(string), DEPENDENCY(string), 
FIELDS(json) und FIELDSMETA(string).

**Eintrag in Tablesmenu**   
Der Name der Tabelle wird hier eingetragen. Aus dieser Tabelle wird dann das 
Menu erzeugt und angezeigt.

**Die Page wird erzeugt**   
Eine Seite wird für diese Tabelle erzeugt. Auch sie bekommt eine 
[Schaltleiste](#dieschaltleiste).



### Die Schaltleiste
Die Schaltleiste ist eine kleine Menüleiste und befindet sich in der Regel im Header
eines jeden Fenster. In ihr sind Schaltflächen untergebracht, die für die Steuerung 
des entsprechenden Fensters zuständig sind und es ist immer ein Button <...> vorhanden 
mit einem Aufklappmenu. Hier gibt es Menüpunkte, die zu diesem Fenser aktuell sind.



## Der technische Aufbau

