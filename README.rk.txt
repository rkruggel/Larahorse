install
-------
nach dem auscecken:
  npm install

Sass & css
----------
In /webpack.mix.js steht welche styles kompiliert werden soll.
https://laravel.com/docs/8.x/mix
im Terminal starten:
  npm run watch
Dann werden alle änderungen in den .sass-files automatisch kompiliert.
'public/css/tmpcompile' muss in die .gitignore aufgenommen werden.
oder
package.json öffnen. Im Contextmenu 'Show npm-scripts'

Livewire event funktioniert nicht
---------------------------------

In composer.json diese Zeile einfügen.

<code>
    "scripts": {
        "post-autoload-dump": [
            ...
            "@php artisan vendor:publish --force --tag=livewire"
        ],
</code>




