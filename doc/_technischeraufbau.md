## technischer Aufbau

Ich will versuchen hier in kurzen knappen Worten die grundsätzliche Verfahrensweise von *Larahorse* zu beschreiben.

Nach dem Start der Webapplikation suchen sie eine Applikation aus. In diesem Fall *Stall*

#### Der Screen
Der Hauptscreen besteht aus 3 Teilen.

- Das Hauptmenu. Es ist an dem oberen Rand des Bildschirmes. Hier befindet sich ein Login, der Startknopf für App *Stall* und einige wenig Adminmenüs.
- Das Seitenmenü. Ee befindet sich auf der linken Seite. Hier sind die einzelnen Tabellen aufgelistet. Dieser Bereich wird vom Benutzer erstellt. Wenn eine neue Tabelle erzeugt wird, wird sie hier eingetragen und angezeigt.
- Der Main-Screen. Der restliche Screen wird von dem Anzeigebereich der Tabellenseiten eingenommen. Hier werden die einzelnen Seiten mit ihren Attribunten und Such- und Änderungemenüs angezeigt.

Da *Larahorse* eine Datengetriebene App ist, dreht sich alles um Daten. Bei der Installation von *Stall* ist schon eine Datenbank erstellt worden. Jetzt müssen wir sie mit vernünftigen Daten füttern.

#### Tabelle erstellen
Wir müssen also zuerst mal eine Tabelle erstellen. In der Schaltleiste befindet sich ein '+'-Zeichen. Klicken sie darauf und geben sie in dem angezeigten Fenster den Tabellennamen ein. Hier in der Demo soll es *Einsteller* sein. Dieser Name ist auch der, der in dem Menü angezeigt wird. Die Tabelle, der Menüeintrag und die Seite werden nun erstellt und können sofort verwendet werden.

#### Den Screen aufrufen
Klicken sie im Seitenmenü auf *Einsteller*. Im Bereich Main-Screen öffnet sich der Bildschirm für die Tabelle, die wir gerade erzeugt haben. Sie besteht im Moment nur aus dem Namen und der Schaltleiste.

#### Die Schaltleiste
Die Schaltleiste befindet sich im Seitenmenu, im Main-Screen und in jedem Detail-Screen. Sie dient zur Steuerung der eintelnen Aktionen die in diesem Fenster möglich sind. Manche Elemente sind gleich, viele Elemente sind jedoch speziell für das entsprechende Fenster.

#### Das Schema
Um jetzt in einer Tabelle Daten speichern zu können müssen wir Felder definieren. Die Felder haben Namen und können bestimmte Daten aufnehmen die wiederum von einem definiertem Typ sind. Diese Festlegung nennt man Schema.

Wenn wir in der Schaltleiste auf *Schema* klicken, geht ein Dialogfenster auf. Hier werden die vohandenen Felder angezeigt. In unserem Fall ist das Fenster noch leer. Wir können nun die ersten Felder eintragen. Da es sich um Personenbezogene Daten handelt geben wir folgende Felder ein

    Name text 80
    Adresse text 250
    Email text 100
    Datum date
    
Unser Schema besteht nun aus vier Feldern. Name, Adresse, Email und Datum. Sie sind alle vom Typ text ausser Datum, das ist ein Datumsfeld.

Sie können jetzt die Dialogfenster schließen. Die erste Tabelle mit den entsprechenden Feldern ist erstellt.

#### Daten
Wenn wir die Dialogfelder geschlossen haben, sehen wir wieder den Main-Screen. Jetzt hat er jedoch vier Felder. Jedoch alle ohne Daten.

Das müssen wir ändren. Im der Schltleiste gibt ein '+'-Zeichen. Klicken Sie darauf und sie können den ersten Datensatz erfassen. Ein weiters klicken auf das '+'-Zeichen erfasst den zweiten Datensatz, und so weiter. Die Anzahl der Datensätze ist überigens nicht beschränkt. 

Die Daten werden nun in einer Tabellenform angezeigt. Das ist die einfachste und übersichtlichste Form große Mengen von Daten anzuzeigen.


