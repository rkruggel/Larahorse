<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 shadow-lg">

            <input type="text" class="form-input" placeholder="Search Contacts..."
                   wire:model="query"
                   wire:keydown.escape="reset"
                   wire:keydown.tab="reset"
                {{--                wire:keydown.ArrowUp="decrementHighlight"--}}
                {{--                wire:keydown.ArrowDown="incrementHighlight"--}}
                {{--                wire:keydown.enter="selectContact"--}}
            />

            <div wire:loading id="message">
                <div class="m1">
                    <div class="alert alert-info inner" role="alert">
                        Searching...
                    </div>
                </div>
            </div>


            {{--            @if(!empty($search))--}}
            {{--    --}}
            {{--                <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>--}}
            {{--    --}}
            {{--                <span style="font-style: italic">{{$search}}</span>--}}
            {{--    --}}
            {{--                <ul>--}}
            {{--                    @foreach($pusers as $puser)--}}
            {{--                        <li wire:key="{{ $loop->index }}">{{ $puser->nachname . ' ' . $puser->vorname }}</li>--}}
            {{--                    @endforeach--}}
            {{--                </ul>--}}
            {{--            @endif--}}

            @if(!empty($query))
                {{--                <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>--}}
                {{--        --}}
                {{--                <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">--}}
                @if(!empty($contacts))
                    <div class="list-item">
                        <table class="setable">
                            @foreach($contacts as $i => $contact)
                                {{--                            <a href="{{ route('show-contact', $contact['id']) }}"--}}
                                {{--                               class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"--}}
                                {{--                            >{{ $contact['nachname'] }}</a>--}}
                                {{--    --}}
                                {{--                            <a href="#"--}}
                                {{--                               class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"--}}
                                {{--                            >{{ $contact['nachname'] }}</a>--}}
                                <tr>
                                    <td>
                                        {{--                                    <a href="{{ route('showDetails', $contact['id']) }}">&nbsp;{{$contact['id']}}&nbsp;</a>--}}
                                        {{--                                    <a href="{{ '/livewire.SearchPuser.showDetails' }}">&nbsp;{{$contact['id']}}&nbsp;</a>--}}
                                        {{--                                    wire:click="$emit('showDetails( {{ $contact }}, {{$contact['id']}} )') "--}}
                                        <button class="btn btn-link btn-sm" type="button"
                                                wire:click="showDetails( '{{ json_encode( $contact['_id'] ) }}' )" >
                                            {{ $contact['nachname'] }}
                                        </button>
                                    </td>
                                    <td>{{$contact['vorname']}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <div class="list-item">No results!</div>
                @endif
            @endif
        </div>  <!-- col -->

        <div class="mx-2"></div>


        @include('livewire.puser-wnd-telefon')
        @include('livewire.puser-wnd-screen')


        @if (session()->has('message'))
            <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
            </div>
        @endif

        <div class="col shadow-lg">
            <nav class="my-0 my-md-0 mr-md-3">
                <button class="btn btn-link btn-sm" wire:click="reset">clear</button>
                <button class="btn btn-link btn-sm disabled" wire:click="{{ null }}">edit</button>
                <button class="btn btn-link btn-sm disabled" wire:click="{{ null }}">delete</button>
                <button class="btn btn-link btn-sm disabled" wire:click="{{ null }}">add</button>
                <button class="btn btn-link btn-sm disabled" wire:click="{{ null }}">   </button>
                @if(!empty($selectvar))
                    <button class="btn btn-link btn-sm"
                            data-toggle="modal" data-target="#wndScreenShowModal"
                            wire:click="wndScreenShow({{ $selectvar->id }})">
                        screen
                    </button>
                @endif
            </nav>

            <br>
            @if(!empty($selectvar))
                <table class="table table-sm table-hover">
                    <colgroup>
                        <col style="width: 20%"/>
                        <col style="width: 80%"/>
                    </colgroup>
                    <tbody>
{{--                    <tr>--}}
{{--                        <td>Id</td>--}}
{{--                        <td>{{ $selectvar['_id'] }}</td>--}}
{{--                    </tr>--}}
                    <tr>
                        <td>Anrede</td>
                        <td>{{ $selectvar['anrede'] }}</td>
                    </tr>
                    <tr>
                        <td>title</td>
                        <td>{{ $selectvar['title'] }}</td>
                    </tr>
                    <tr>
                        <td>Vorname</td>
                        <td>{{ $selectvar['vorname'] }}</td>
                    </tr>
                    <tr>
                        <td>Nachname</td>
                        <td>{{ $selectvar['nachname'] }}</td>
                    </tr>
                    <tr>
                        <td>Rufname</td>
                        <td>{{ $selectvar['rufname'] }}</td>
                    </tr>
                    <tr>
                        <td>Zusatz</td>
                        <td>{{ $selectvar['zusatz'] }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $selectvar['email'] }}</td>
                    </tr>
                    <tr>
                        <td>WWW</td>
                        <td>{{ $selectvar['www'] }}</td>
                    </tr>
                    <tr>
                        <td>Anschrift</td>
                        <td>{{ $selectvar['anschrift'] }}</td>
                    </tr>
                    <tr>
                        <td>geb</td>
                        <td>{{ $selectvar['geb'] }}</td>
                    </tr>
                    <tr>
                        <td>Landsmann</td>
                        <td>{{ $selectvar['landsmann'] }}</td>
                    </tr>
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <button class="btn btn-link btn-sm p-0"--}}
{{--                                    data-toggle="modal" data-target="#wndTelefonShowModal"--}}
{{--                                    wire:click="wndTelefonShow({{ $selectvar->id }})">--}}
{{--                                Telefon--}}
{{--                            </button>--}}
{{--                        <td>{{ $this->tgg($selectvar['telefon']) }}</td>--}}
{{--                    </tr>--}}

                    <tr>
                        <td>Aufgabe</td>
                        <td>{{ $selectvar['aufgabe'] }}</td>
                    </tr>
                    <tr>
                        <td>Bemerkung</td>
                        <td>{{ $selectvar['bemerkung'] }}</td>
                    </tr>

                    <tbody>
                </table>


            @endif

        </div>  <!-- col -->

    </div>  <!-- row -->
</div>
