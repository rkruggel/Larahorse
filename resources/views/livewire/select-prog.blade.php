<div>
    <p>
        <b>{{ $testvar[0] }}</b>
        {{ $testvar[1] }}:
        {{ $progname }}
{{--        {{ session('progname') }}--}}
    </p>

    <div class="nav-scroller bg-white shadow-sm">
        <ul class="nav justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">...</a>
                <div class="dropdown-menu">
                    <button class="dropdown-item small" wire:click="add" >Add</button>
{{--                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}"--}}
{{--                            wire:click="delete">Delete</button>--}}
                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}"
                            data-toggle="modal" data-target="#wndProgShowModal"
                            wire:click="wndProgShow()">Delete+</button>

                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}" wire:click="edit" >Edit</button>
                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}" wire:click="editall" >Edit all</button>
                    <button class="dropdown-item small {{ strlen($progname) == 0 ? 'disabled' : '' }}" wire:click="clear" >Clear</button>
                </div>
            </li>

        </ul>
    </div>

    <!-- anzeige des 'ProgList' Fensters -->
    @if(!empty($proglists))
        <div class="list-item">
            <table class="setable">
                @foreach ($proglists as $i => $proglist)
                    <tr>
                        <td>
                            <button class="btn btn-link btn-sm" type="button"
                                wire:click="saveProg( '{{ $proglist->name }}' )">
                                {{ $proglist->name }}
                            </button>
                        </td>
                        <td>
                            {{ $proglist->desc }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

    @include('livewire.prog-wnd')

</div>
