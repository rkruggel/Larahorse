## technischer Aufbau

Ich will versuchen hier in kurzen knappen Worten die grundsätzliche Verfahrensweise von *Larahorse* zu beschreiben.

Nach dem Start der Webapplikation suchen sie eine Applikation aus. In diesem Fall *Stall*

#### Der Screen
Der Hauptscreen besteht aus 3 Teilen.

- Das Hauptmenu. Es ist an dem oberen Rand des Bildschirmes. Hier befindet sich ein Login, der Startknopf für App *Stall* und einige wenig Adminmenüs.
- Das Seitenmenü. Ee befindet sich auf der linken Seite. Hier sind die einzelnen Tabellen aufgelistet. Dieser Bereich wird vom Benutzer erstellt. Wenn eine neue Tabelle erzeugt wird, wird sie hier eingetragen und angezeigt.
- Der restliche Screen wird von dem Anzeigebereich der Tabellenseiten eingenommen. Hier werden die einzelnen Seiten mit ihren Attribunten und Such- und Änderungemenüs angezeigt.

Da *Larahorse* eine Datengetriebene App ist dreht sich alles um Daten. Bei der installation von *Stall* ist schon eine Datenbank erstellt worden. Jetzt müssen wir sie mit vernünftigen Daten füttern.

#### Tabelle erstellen

Wir müssen also zu erst mal eine Tabelle erstellen. In der Schaltleiste befindet sich ein '+'-Zeichen. Klicken sie darauf und geben sie in dem angezeigten Fenster den Tabellennamen ein. Hier in der Demo soll es *Einsteller* sein. Dieser Name ist auch der der in dem Menü angezeigt wird. Die Tabelle, der Menüeintrag und die Seite werden nun erstellt und können sofort verwendet werden.