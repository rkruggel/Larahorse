# Readme: migrations

## Erstellen der Migration:

Die Befehle werden alle aus einem Terminal aufgerufen. 
Aus dem Verzeichnis

    cd ~/devilbox/data/www/larahorse/laravel-project

oder
    
    cd ~/Larahorse
    
    
oder im Terminal von PhpStorm (Alt+F12)

    in PHPStorm ein Terminal Fenster öffnen


### Vorarbeiten

Die Datenbank muss erstellt sein.



### Erstellen eines neuen Migrationsfiles
 
Erstellt den Rumpf der Migrationsdatei
 
    php artisan make:migration create_puser_table

Hier befindet sich dann die Datei.   
Bspl.: 2020_08_10_155012_create_puser_table.php

    ./database/migrations
 
Jetzt kann die Migration aufrufen

    php artisan migrate

Ruft wieder den letzten Schritt zurück
    
    php artisan migrate:rollback
 
Löscht alle Tabellen und baut sie neu auf
 
    php artisan migrate:fresh
  
  
Daten hinzufügen
----------------

Einen Seeder erstellen
    
    php artisan make:seeder AdressSeeder
 
