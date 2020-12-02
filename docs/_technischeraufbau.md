# technischer Aufbau

Ich will versuchen hier in kurzen knappen Worten die grundsätzliche Verfahrensweise von *Larahorse* zu beschreiben.

Nach dem Start der Webapplikation suchen sie eine Applikation aus. In diesem Fall *Stall*

#### Der Screen
Der Hauptscreen besteht aus 3 Teilen.

- Das Hauptmenu. Es ist an dem oberen Rand des Bildschirmes. Hier befindet sich ein Login, der Startknopf für App *Stall* und einige wenig Adminmenüs.
- Das Seitenmenü. Ee befindet sich auf der linken Seite. Hier sind die einzelnen Tabellen aufgelistet. Dieser Bereich wird vom Benutzer erstellt. Wenn eine neue Tabelle erzeugt wird, wird sie hier eingetragen und angezeigt.
- Der Mainscreen. Der restliche Screen wird von dem Anzeigebereich der Tabellenseiten eingenommen. Hier werden die einzelnen Seiten mit ihren Attribunten und Such- und Änderungemenüs angezeigt.

Da *Larahorse* eine Datengetriebene App ist, dreht sich alles um Daten. Bei der Installation von *Stall* ist schon eine Datenbank erstellt worden. Jetzt mussen sie nur noch mit vernünftigen Daten gefüttert werden.

#### Tabelle erstellen
Sie müssen also zuerst mal eine Tabelle erstellen. In der Schaltleiste befindet sich ein '+'-Zeichen. Klicken sie darauf und geben sie in dem angezeigten Fenster den Tabellennamen ein. Hier in der Demo soll es *Einsteller* sein. Dieser Name ist auch der, der in dem Menü angezeigt wird. Die Tabelle, der Menüeintrag und die Seite werden nun erstellt und können sofort verwendet werden.

#### Den Screen aufrufen
Klicken sie im Seitenmenü auf *Einsteller*. Im Bereich Mainscreen öffnet sich der Bildschirm für die Tabelle, die sie gerade erzeugt haben. Sie besteht im Moment nur aus dem Namen und der Schaltleiste.

#### Die Schaltleiste
Die Schaltleiste befindet sich im Seitenmenu, im Mainscreen und in jedem Detail-Screen. Sie dient zur Steuerung der einzelnen Aktionen, die in diesem Fenster möglich sind. Manche Elemente sind gleich, viele Elemente sind jedoch speziell für das entsprechende Fenster.

#### Das Schema
Um jetzt in einer Tabelle Daten speichern zu können müssen sie Felder definieren. Die Felder haben Namen und können bestimmte Daten aufnehmen die wiederum von einem definiertem Typ sind. Diese Festlegung nennt man Schema.

Wenn sie in der Schaltleiste auf *Schema* klicken, geht ein Dialogfenster auf. Hier werden die vohandenen Felder angezeigt. In unserem Fall ist das Fenster noch leer. Sie können nun die ersten Felder eintragen. Da es sich um Personenbezogene Daten handelt geben sie folgende Felder ein:

    Name text 80
    Adresse text 250
    Email text 100
    Datum date
    
Ihr Schema besteht nun aus vier Feldern. Name, Adresse, Email und Datum. Sie sind alle vom Typ *text* ausser Datum, das ist ein Datumsfeld und somit vom Typ *date*.

Sie können jetzt die Dialogfenster schließen. Die erste Tabelle mit den entsprechenden Feldern ist erstellt.

## CRUD
CRUD steht für **C**reate, **R**ead, **U**pdate und **D**elete. Es ist in der EDV und im Datenmanagement ein fester Begriff. Er steht für *erstellen, lesen, ändern und löschen* eines Datensatzes.

#### Daten erfassen (*C*)
Wenn sie die Dialogfelder geschlossen haben, sehen sie wieder den Mainscreen. Jetzt hat er jedoch vier Felder. Jedoch alle ohne Daten.

Das müssen sie ändern. In der Schaltleiste gibt ein '+'-Zeichen. Klicken Sie darauf und sie können den ersten Datensatz erfassen. Ein weiters klicken auf das '+'-Zeichen erfasst den zweiten Datensatz und so weiter. Die Anzahl der Datensätze ist überigens nicht beschränkt. 

#### Daten suchen (*R*)
Die Daten werden nun in einer Tabellenform angezeigt. Das ist die einfachste und übersichtlichste Form große Mengen von Daten anzuzeigen.

Um Daten zu suchen haben sie jetzt mehrere Möglichkeiten

1. Sie sortieren die Liste. In der Schaltleiste befindet sich die eintsprechende Schaltfläche. Sie können nach verschiedenen Feldern sortieren, aufsteigend oder absteigend.
2. Sie filtern die Liste. In der Schaltleiste befindet sich die entsprechende Schaltfläche. Sie können verschiedene Felder nach unterschiedlichen Kriterien filtern. Das aufpoppende Dialogfenster zeigt ihnen verschiedene Möglichkeiten an.
3. Sie suchen einen ganz bestimmten Datensatz. Sie müssen hier die ID des Datensatzes eingeben. Alles anderen suchen sind nicht eindeutig.

Die Ausgabe aller Suchergebnisse erfolgt in Tabellenform im Mainscreen.

#### Daten ändern (*U*)
Jedem ändern geht ein Suchen voraus. Den Datensatz anklicken dann in der Schaltleiste *ändern* anklicken. Danach geht das selbe Fenster wie beim Erfassen auf, jedoch sind die Felder schon mit Daten des selectierten Datensatzes gefüllt. Diese können nun geändert werden.

#### Daten löschen (*D*)
Jedem löschen geht ein Suchen voraus. Den Datensatz anklicken dann in der Schaltleiste *löschen* anklicken. Nach dem Bestätigen einer Sicherheitsabfrage ist der Datensatz verschwunden.


## Die View
Die Anzeige der Daten erfolgt über eine View. Die View setzt folgende Attribute:

- Definieren der Felder die angezeigt werden sollen.
- Die Reihenfolge der Felder
- Eine mögliche Sortierung
- Ein möglicher Filter
- Felder weiterer Tabellen. Siehe [hier](#tabellen-verlinken)
- Felder die programmatischen Ursprung haben. Siehe [hier](#programme)

Zum erstellen einer View lassen sie sich die Daten anzeigen, wie unten beschrieben, mit sortier- und filtereinstellungen und und speichern sie dann als View unter einem beliebigen Namen ab. 

#### Daten anzeigen
Die Anzeige der Daten, egal ob sortiert und/oder gefiltert, erfolgt in einer Tabellarischen form. In jeder Zeile steht somit ein Datensatz. Dieses ist die übersichtlichste und am einfachsten zu überschauende Form der Datendarstellung. 

Allerdings nur bei wenigen Feldern. Wenn sie eine Tabelle mit fünf Feldern haben in denen jeweils nur 10 Zeichen stehen, ist die Darstellung in einer Zeile sehr übersichtlich. Bei 50 Feldern sieht das schon ganz anders aus. Der Mainscreen wird dann zwar einen horizontalen Slider darstellen, aber das hin- und herscrollen kann auch lästig werden.

Wie so oft gibt es auch hier mehrere Möglichkeiten:

1. Sie lassen sortieren sich die Spalten. Sie klicken auf den Kopf der Spalte und ziehen in an eine Position wo sie sie besser sehen. So können sie die wichtigen Daten ganz am anfang stellen und die weniger wichtigen dahinter. Aber es ist noch alles, mit hilfe des Sliders, zu sehen.
2. Sie blenden Spalten aus. Ein rechtsklick auf den Kopf der Spalte ermöglicht das Ausblenden. Punkt 1 kann natürlich zusätzlich angewandt werden.
3. Wenn sie den horizontal angezeigt Datensatz komplett sehen wollen können sie den Datensatz doppelt klicken. Dann geht ein Dialogfenster auf und zeigt diesen einen Datensatz komplett an. Die Darstellung ist nun vertikal.



--------------------------------------------------—



## Tabellen verlinken
Hier handelt es sich um verlinkte Tabellen. Sie sind mit einem Join verbunden. Ist optional. Kommt später.

## Programme
Hier wird die Möglichkeit beschrieben in Larahorse zu programmieren. Oftmals müssen Aktionen erstellt werden die über ein einfaches Anzeigen von Daten hinaus gehen. Da muss programmiert werden. Als Programmiersprache haben wir Lua vorgesehen. Sie ist einfach und kann eingebettet werden.