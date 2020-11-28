<!-- Modal -->
<div wire:ignore.self class="modal fade" id="wndTelefonShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if(!empty($telefons))
                    @foreach($telefons as $key => $telefon)
                        <form>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
{{--                                                <label for="ex1">Key</label>--}}
                                                <input type="text" class="form-control" wire:model="telefons.{{ $key }}.key" id="ex1">
                                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
{{--                                                <label for="ex2">Nummer</label>--}}
                                                <input type="text" class="form-control" wire:model="telefons.{{ $key }}.value" id="ex2">
                                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
