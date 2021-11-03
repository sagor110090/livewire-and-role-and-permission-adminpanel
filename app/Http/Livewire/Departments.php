<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Departments extends Component
{
    use WithPagination;
     use AuthorizesRequests;

     protected $listeners = [
        'confirmed',
        'cancelled',
        'bulkDelete'
    ];

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord,$deleteId,$checkedAll, $name;
    public $checked = [];
    public $perPage = 10;


    public function render()
    {
        $this->authorize('department-list');

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.departments.index', [
            'departments' => Department::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->paginate($this->perPage),
        ])->extends('layouts.app');
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetInput()
    {		
		$this->name = null;
    }

    public function store()
    {
        $this->authorize('department-create');

        $this->validate([
		'name' => 'required',
        ]);

        Department::create([ 
			'name' => $this-> name
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		$this->alert('success', 'Department Successfully created.');
    }

    public function edit($id)
    {
        $record = Department::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;

    }
    public function show($id)
    {
        $record = Department::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;

    }

    public function update()
    {
        $this->authorize('department-edit');

        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Department::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name
            ]);

            $this->resetInput();
			$this->alert('success', 'Department Successfully updated.');
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
        $this->authorize('department-delete');

        if ($this->datetId) {
            $record = Department::where('id', $this->datetId);
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
        $this->authorize('department-delete');

        Department::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->alert( 'success', 'Deleted successfully.');
    }

    public function updatedCheckedAll($value)
    {
        if ($value) {
            $this->checked = Department::pluck('id');
        }else{
            $this->checked = [];
        }
    }


}
