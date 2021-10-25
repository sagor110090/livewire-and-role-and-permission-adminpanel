@section('title', __('Posts'))
<div>
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">Post Listing</h3>
                </div>
                <div>
                @can('post-create')
                    <button type="button" href="#" data-bs-toggle="modal" wire:click.prevent="resetInput()"  data-bs-target="#staticBackdrop"
                        class="btn btn-white"><i class="fa fa-plus"></i> Create New Posts</button>
                @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
        <div class="card rounded-3">
            <div class="card-body">
                <div class="justify-content-between align-items-center mb-3">
                    @include('livewire.posts.create')
                    @include('livewire.posts.update')
                    @include('livewire.posts.view')
                    <button class="btn btn-danger btn-sm mb-2" {{ count($checked) == 0 ? 'disabled' : '' }}
                        wire:click='bulkDeleteTriggerConfirm()'> <i class="fa fa-trash" aria-hidden="true"></i> Bulk delete({{ count($checked) }})
                    </button>
				<div class="table-responsive">
                 <div class="mb-4">
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Search Posts">
                        </div>
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
                            <td><input type="checkbox" value="1" wire:model="checkedAll"></td>
								<td>#</td> 
								<th>Title</th>
								<th>Body</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $row)
							<tr>
                            <td><input type="checkbox" value="{{ $row->id }}" wire:model="checked">
                                        </td>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->title }}</td>
								<td>{{ $row->body }}</td>
								<td width="200">

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropShow" class="btn btn-warning btn-sm"wire:click="show({{ $row->id }})"><i
                                            class="fa fa-eye"></i></button>

                                        @can('post-create')

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate" class="btn btn-success btn-sm"wire:click="edit({{ $row->id }})"><i
                                            class="fa fa-edit"></i></button>

                                        @endcan

                                        @can('post-delete')

                                            <button class="btn btn-danger btn-sm"
                                            wire:click="triggerConfirm({{ $row->id }})"><i
                                                class="fa fa-trash"></i> </button>
                                        @endcan


								</td>
							@endforeach
						</tbody>
					</table>
					{{ $posts->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
