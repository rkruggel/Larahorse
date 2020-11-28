# Readme: migrations

## Erstellen der Seeder:

  
Daten hinzufügen
----------------

Einen Seeder erstellen
    
    php artisan make:seeder AdressSeeder
 
So wird der seeder aufgerufen

    php artisan db:seed 

Dieser Befehl baut die gesamte Datenbank neu auf und füllt sie mit Daten.

    php artisan migrate:fresh --seed


Alle Befehler die den Seeder aufrufen, rufen nur
die Datei <code>./seeds/DatabaseSeeder.php</code> auf.
Hier müssen alle anderen Seeder-Dateien aufgerufen werden
