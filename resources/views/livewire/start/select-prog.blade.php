<div>
    <p><b>{{ $brand  }}</b></p>
    <p>
        B: {{ $progname }}
    </p>

    <!-- ??? -->
    <div class="nav-scroller bg-white shadow-sm">
        <ul class="nav justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">...</a>
                <div class="dropdown-menu">
                    <button class="dropdown-item small" wire:click="add">Add</button>
                    {{--                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}"--}}
                    {{--                            wire:click="delete">Delete</button>--}}
                    {{--                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '--' }}"--}}
                    <button class="dropdown-item small"
                            data-toggle="modal" data-target="#wndProgShowModal"
                            wire:click="wndProgShow()">Delete+
                    </button>

                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}"
                            wire:click="edit">Edit
                    </button>
                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}"
                            wire:click="editall">Edit all
                    </button>
                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}"
                            wire:click="clear">Clear
                    </button>
                </div>
            </li>

        </ul>
    </div>

    <!-- anzeige des 'ProgList' Fensters -->
    @if(!empty($proglists))
        <div class="list-item">
            <table class="setable">
                @foreach ($proglists as $i => $pl)
                    <tr>
                        <td>
                            @if (substr($pl['label'], 0, 2) == '--')
                                <hr>
                            @else

                                @if($pl['type'] === 'wire')
                                    <a class="p-2 text-dark btn-link btn btn-sm"
                                       wire:click="saveProg( '{{ $pl['label'] }}' )">
                                        {{ $pl['label'] }}
                                    </a>
                                @endif
                                @if($pl['type'] === 'file')
                                    <a class="p-2 text-dark btn-link btn btn-sm"
                                       href="{{ $pl['execpath'] }}/{{ $pl['type'] }}/{{ $pl['exec'] }}">
                                        {{ $pl['label'] }}
                                    </a>
                                @endif

                            @endif
                        </td>
                        <td>
                            @if (substr($pl['desc'], 0, 2) == '--')
                                <hr>
                            @else
                                {{ $pl['desc'] }}
                            @endif
                        </td>
                </tr>
                @endforeach
            </table>
        </div>
    @endif

{{--    @include('livewire.prog-wnd')--}}

</div>
