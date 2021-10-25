<!-- Modal -->
<div wire:ignore.self class="modal fade" id="staticBackdropUpdate" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="title"></label>
                <input wire:model="title" type="text" class="form-control" id="title" placeholder="Title">@error('title') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="body"></label>
                <input wire:model="body" type="text" class="form-control" id="body" placeholder="Body">@error('body') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" data-bs-dismiss="modal" class="btn btn-primary close-modal">Update</button>
            </div>
        </div>
    </div>
</div>
