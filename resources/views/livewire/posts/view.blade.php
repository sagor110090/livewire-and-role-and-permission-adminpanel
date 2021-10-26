<!-- Modal -->
<div wire:ignore.self class="modal fade" id="postShowModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="postShowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Post No. {{$selected_id}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group mt-2 mb-2 border border-secondary rounded-1 p-2">
                <label for="title">Title:-</label>
                <div>{{$title}}</div>
            </div>

            <div class="form-group mt-2 mb-2 border border-secondary rounded-1 p-2">
                <label for="body">Body:-</label>
                <div>{{$body}}</div>
            </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
