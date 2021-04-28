<?php

namespace App\Http\Livewire\Crud;

use Livewire\Component;
use Livewire\WithPagination;

class LivewireCrud extends Component
{
    use WithPagination;

    public $model;
    public $search;
    public $filters = [];
    protected $query;
    public $perPage = 10;
    public $showForm = false;
    public $rules = [];
    protected $listeners = ['selectOptionChanged' => 'handleChildSelectChange'];
    public $searchColumns = ['name'];

    
    public function mount()
    {
        $this->rules = $this->model->rules;
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
            $timesSearched = 0;
            foreach($this->searchColumns as $column)
            {
                if ($timesSearched == 0)
                {
                    $query = $query->where($column, 'like', $this->search.'%');
                }
                else
                {
                    $query = $query->orWhere($column, 'like', $this->search.'%');
                }
                
            }
            
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
       else
       {
           $this->showForm = false;
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
        $this->model = new $this->model;
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



    public function handleChildSelectChange ($field, $value = null)
    {
        if ($value)
        {
            eval('$this->'.$field.'='.$value.';');
            $this->triggerUpdateHook($field, $value);
        }
        else 
        {
            eval('$this->'.$field.'="";');
        }
    }


    public function triggerUpdateHook ($field, $value)
    {
        $formattedWord = trim(str_replace(["['", "']"], '_', $field), '_');

        $words = explode('_', $formattedWord);

        $event = 'updated';
        foreach ($words as $word)
        {
            $event = $event.ucfirst($word);
        }

        $this->$event($value);
    }
}