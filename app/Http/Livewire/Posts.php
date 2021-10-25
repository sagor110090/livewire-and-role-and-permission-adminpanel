<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Posts extends Component
{
    use WithPagination;
     use AuthorizesRequests;

     protected $listeners = [
        'confirmed',
        'cancelled',
        'bulkDelete'
    ];

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord,$deleteId,$checkedAll, $title, $body;
    public $checked = [];

    public function render()
    {
        $this->authorize('post-list');

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.posts.index', [
            'posts' => Post::latest()
						->orWhere('title', 'LIKE', $keyWord)
						->orWhere('body', 'LIKE', $keyWord)
						->paginate(10),
        ])->extends('layouts.app');
    }



    public function resetInput()
    {		
		$this->title = null;
		$this->body = null;
    }

    public function store()
    {
        $this->authorize('post-create');

        $this->validate([
		'title' => 'required',
		'body' => 'required',
        ]);

        Post::create([ 
			'title' => $this-> title,
			'body' => $this-> body
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		 $this->alert('success', 'Post Successfully created.');
    }

    public function edit($id)
    {
        $record = Post::findOrFail($id);

        $this->selected_id = $id; 
		$this->title = $record-> title;
		$this->body = $record-> body;

    }
    public function show($id)
    {
        $record = Post::findOrFail($id);

        $this->selected_id = $id; 
		$this->title = $record-> title;
		$this->body = $record-> body;

    }

    public function update()
    {
        $this->authorize('post-edit');

        $this->validate([
		'title' => 'required',
		'body' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Post::find($this->selected_id);
            $record->update([ 
			'title' => $this-> title,
			'body' => $this-> body
            ]);

            $this->resetInput();
			$this->alert('success', 'Post Successfully updated.');
        }
    }

     public function triggerConfirm($id)
    {
        $this->datetId = $id;
        $this->confirm('Do you want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled',
        ]);
    }

    public function confirmed()
    {
        $this->destroy();
        $this->alert( 'success', 'Deleted successfully.');
    }

    public function cancelled()
    {
        $this->alert('info', 'Understood');
    }

    public function destroy()
    {
        $this->authorize('post-delete');

        if ($this->datetId) {
            $record = Post::where('id', $this->datetId);
            $record->delete();
        }
    }

    public function bulkDeleteTriggerConfirm()
    {
        $this->confirm('Do you want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'bulkDelete',
            'onCancelled' => 'cancelled',
        ]);
    }

    public function bulkDelete()
    {
        Post::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->alert( 'success', 'Deleted successfully.');
    }

    public function updatedCheckedAll($value)
    {
        if ($value) {
            $this->checked = Post::pluck('id');
        }else{
            $this->checked = [];
        }
    }


}
