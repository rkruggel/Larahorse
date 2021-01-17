<div>
    @section('file', 'larahorse/resources/views/start/start.blade.php')


    A: {{ $progname }}

    <div id="startscreen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-md-5">
                    {{--        <livewire:select-prog :post='testpost'/>--}}
                    <livewire:start.select-prog/>
                </div>

                <div class="col-md-8">
                    <h1 class="display-6">
                        {!! html_entity_decode($body[1]['txt']) !!}
                    </h1>
                    <p class="text-muted">
                        {!! html_entity_decode($body[2]['txt']) !!}
                    </p>
                </div>

            </div>
        </div>
    </div>

</div>
