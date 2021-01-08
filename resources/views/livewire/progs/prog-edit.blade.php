
@push('css')
    <style>
        .CodeMirror {border: 1px solid black; font-size:13px}
    </style>
@endpush

@once
    @push('scriptOnBottom')
        <script>
            const myCodeMirror = CodeMirror.fromTextArea(document.getElementById("code"), {
                lineNumbers: true,
                styleActiveLine: true,
                matchBrackets: true,
                mode: 'yaml'
            });
        </script>

    @endpush
@endonce

<div>
    die anzeige
    <form>
        <textarea id="code" name="code" style="height: 400px; width:800px;">
            {{ $yamltext }}
        </textarea>
    </form>

    {{--    public $statusGroupOpen = false;--}}
    {{--    <div class="collapse @if ($statusGroupOpen) show @endif" id="collapseStatus">--}}

    {{--        mode: { name: "javascript", json: true }--}}
</div>

