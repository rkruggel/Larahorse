# Anzeige der Files

### Die ersten index.php
```
public/index.php
```

### Die erste Seite darstellen
```
routes/web.php
Route::get('/', StartController::class);
        |
        V
app/Http/Controllers/StartController.php
return view('start');
        |
        V
resources/views/start.blade.php  <-+
        |                          | 
        |          resources/views/layouts/master.blade.php
        V
  + ----------------- +
  | Anzeige der Seite |
  + ----------------- +
```


### Lifewire anzeigen
```
resources/views/layouts/master.blade.php
<a class="..." href="{{ url('/puser/index') }}"
        |
        V
resources/views/puser/index.blade.php  
<livewire:puser-main />        
          
resources/views/livewire/puser-main.blade.php  <-+        
die Site die angezeigt werden soll                                         |
        |                                        |
        |                    app/Http/Livewire/PuserMain.php
        |                    der Controller
        V
  + ----------------- +
  |   Alle Aktionen   |
  + ----------------- +








```





