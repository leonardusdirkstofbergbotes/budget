<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Filters\TableFilters;

class Budget extends Component
{
    use WithPagination, TableFilters;

    public Item $model;
    public $search;
    public $filters = [];
    protected $query;
    public $perPage = 10;
    public $showForm = false;
    public $rules = [];

    public function mount()
    {
        $this->model = new Item;
        $this->rules = $this->model->rules;
    }


    public function render()
    {
        return view('livewire.budget', [
            'records' => $this->recordsQuery,
        ])->extends('layouts.master');
    }


    public function getRecordsQueryProperty ()
    {
        $query = $this->model->query();

        $query = $this->search($query);

        $query = $query->paginate($this->perPage);

        return $query;
    }


    public function search ($query)
    {
        if ($this->search != '')
        {
            $query = $query->where('name', 'like', $this->search.'%');
        }

        return $query;
    }



    public function updatedShowForm ($show)
    {
        if ($show)
        {
            $this->resetModelFields();
        }
    }


    /**
     * Checks the given model for any defined defaults and sets it 
     * 
     * @return void
     */
    public function setModelDefaults() 
    {
        if (!empty($this->model->defaultFieldValues())) {
    
            foreach($this->model->defaultFieldValues() as $field => $defaultValue) {

                $this->model->$field = $defaultValue;
            }
        } 
    }



    public function saveNewItem ($createAnother = false)
    {
       $this->validate();
       $this->notifyUserOfStatus($this->model->save());
       
       if ($createAnother)
       {
           $this->resetModelFields();
       }
    }



    public function edit ($id)
    {
        $this->model = $this->model->where('id', $id)->first();
        $this->showForm = true;
    }


    public function delete($id)
    {
        $this->model->where('id', $id)->delete();
    }



    public function resetModelFields() 
    {
        $this->model = new Item;
        $this->setModelDefaults();
    }



    public function notifyUserOfStatus($status, $successMessage = null, $failMessage = null, $infoMessage = null) {

        if ($status == true || $status == 1) {

           $this->dispatchBrowserEvent('success', $successMessage ?? 'Action Performed Successfully');
       
       } else {

           if ($status == 'info') {

               $this->dispatchBrowserEvent('info', $infoMessage);
   
           } else {

               $this->dispatchBrowserEvent('failed', $failMessage ?? 'Action Could Not Be Performed');

           }

       }
    }
}
