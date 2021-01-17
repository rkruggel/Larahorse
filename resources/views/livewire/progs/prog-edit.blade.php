
@push('css')
    <style>
        .CodeMirror {
            border: 1px solid black;
            font-size: 13px;
            /*max-width: 1000px;*/
            max-height: 600px;
            /*width: 100%;*/
            /*height: 100%;*/
        }
    </style>
@endpush

@once
    @push('scriptOnBottom')
        <script>
            /*
             Erstellt über der <textarea> einen editor
            */
            var myCodeMirror = CodeMirror.fromTextArea(document.getElementById("code"), {
                lineNumbers: true,
                styleActiveLine: true,
                matchBrackets: true,
                mode: 'yaml'
            });

            /*
             Speichert die geänderten Daten des Textfeldes.
             Wird aufgerufen über ein Button-Klick
             */
            function savefiles(opl) {
                // Editor-Daten holen
                let edata = myCodeMirror.getValue();
                // Speichert die geänderten Editor-Daten in dem PHP-Filed $yamlback
            @this.yamlback
                = edata;
                // Ruft die PHP-Funktion editorsave() auf
            @this.editorSave(edata);
            }

        </script>
    @endpush
@endonce

<div>

    {{ $_SESSION['lara']['progname'] ??  'nix' }}

    <form>

        <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark btn-link" href="#"
                   onclick="savefiles();"
                   data-toggle="tooltip" data-html="true" title="Daten speichern und im Editor bleiben">
                    speichern
                </a>
                {{--                <a class="p-2 text-dark btn-link" href="#"--}}
                {{--                   wire:click="editorSave()"--}}
                {{--                   data-toggle="tooltip" data-html="true" title="Daten speichern und ende" >--}}
                {{--                    speichern--}}
                {{--                </a>--}}
                {{--                <a class="p-2 text-dark btn-link" href="#"--}}
                {{--                   wire:click="editorLoad()"--}}
                {{--                   data-toggle="tooltip" data-html="true" title="Daten erneut laden" >--}}
                {{--                    refresh--}}
                {{--                </a>--}}

            </nav>
        </div>


        <textarea id="code" name="code" style="height: 400px; width:800px;">
            {{ $yamltext->data }}
        </textarea>
        <p style="font-size: 11px; font-family: Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace" ;>
            <b>key:</b> {{ $yamltext->key }} &nbsp;&nbsp;
            <b>created:</b> {{ $yamltext->created_at }} &nbsp;&nbsp;
            <b>last modified</b> {{ $yamltext->updated_at }}
        </p>

    </form>

    <div class="output"/>

    {{--    public $statusGroupOpen = false;--}}
    {{--    <div class="collapse @if ($statusGroupOpen) show @endif" id="collapseStatus">--}}

    {{--        mode: { name: "javascript", json: true }--}}
</div>

