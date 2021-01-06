@extends('layouts.master')

@section('file', 'larahorse/resources/views/start.blade.php')

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



@section('content')
{{--
    <?php echo phpInfo(); die(); ?>
--}}

    <div id="startscreen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-md-5">
                    {{--        <livewire:select-prog :post='testpost'/>--}}
                    <livewire:select-prog />
                </div>

                <div class="col-md-8">
                    <h1 class="display-6">{{ $body[1]['txt'] }}</h1>
                    <p class="text-muted">{!! html_entity_decode($body[2]['txt']) !!}</p>
                    @if(false)
                        <livewire:prog-edit />
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection

