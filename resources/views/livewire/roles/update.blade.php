<!-- Modal -->
<div wire:ignore.self class="modal fade" id="staticBackdropUpdate" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model="name" type="text" class="form-control" id="name"
                            placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Permissions:-</strong>
                        <br>
                        @foreach ($permission as $key => $value)
                            <label>
                                <input type="checkbox"
                                    value="{{ $value->id }}"  wire:model='selected_permission.{{$value->id}}' >
                                {{ $value->name }}
                            </label>
                            <br />
                        @endforeach
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" data-bs-dismiss="modal"
                    class="btn bg-background close-modal text-white">Update</button>
            </div>
        </div>
    </div>
</div>
