<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SelectWithSearch extends Component
{

    public $field;
    public $joinKey;
    public $model, $limit = 10, $search, $options, $originalOptions, $searchKeys = [], $placeHolder, $value;

    public $showOptions = false;
    public $removeScopes = [];
    public $relationship;
    public $helperText;


    public function mount ($field, $model = null, $options = null, $value = null, $limit = 10, $searchKeys = ['name'], $removeScopes = [], $relationship = null, $joinKey = null, $placeHolder = 'Start Typing', $helperText = null)
    {
        $this->field = $field;
        $this->joinKey = $joinKey;
        $this->value = $value;
        $this->removeScopes = $removeScopes;
        $this->relationship = $relationship;
        $this->helperText = $helperText;

        if ($model)
        {
            $this->model = new $model;
            $this->options = $this->eagerLoadRelationship($this->removeScopesIfApplicable($this->model))->limit($this->limit)->get();
        }

        if ($options)
        {
            $this->options = $options;
            $this->originalOptions = $options;
        }

        $this->placeHolder = $placeHolder;
        $this->searchKeys = $searchKeys;
        $this->limit = $limit;
        
        if ($value)
        {
            $alreadyInOptionList = $this->options->filter( function ($option) use ($value) {
                return $option->id == $value;
            })->first();

            if (! $alreadyInOptionList)
            {
                $record = $this->removeScopesIfApplicable($this->model)->where('id', $value)->first();
                $this->options->prepend($record);
            }

            $this->options->map( function($option) use ($value, $searchKeys) {
                
                if ($option->id == $value)
                {
                    if ($this->relationship)
                    {
                        $this->search = $this->loadRelationship($option) ?? $option->full_name ?? $option->first_name ?? $option->name ?? $searchKeys[array_key_first($searchKeys)];
                    }
                    else
                    {
                        $this->search = $option->full_name ?? $option->first_name ?? $option->name ?? $searchKeys[array_key_first($searchKeys)];
                    }
                }
            });
            
        }
    }



    public function eagerLoadRelationship ($model)
    {
        if ($this->relationship)
        {
            $model = $model->with($this->relationship);
        }

        return $model;
    }



    public function removeScopesIfApplicable ($model)
    {
        if (! empty($this->removeScopes))
        {
            foreach($this->removeScopes as $scope)
            {
                $model = $model->withoutGlobalScope($scope);
            }

            return $model;
        }

        return $model->query();
    }


    public function render()
    {
        return view('livewire.components.select-with-search');
    }

    
    public function updatedSearch ($string)
    {
        if ($this->model)
        {
            $loop = 1;
            $query = $this->leftJoinForSearch($this->removeScopesIfApplicable($this->model));

            foreach($this->searchKeys as $key)
            {
                if ($loop == 1)
                {
                    $query = $query->where($key, 'LIKE', "{$string}%");
                }
                else
                {
                    $query = $query->orWhere($key, 'LIKE', "{$string}%");
                }
                $loop++;
            }

            $this->options = $query->select("{$query->getModel()->getTable()}.*")->limit($this->limit)->get();

        }
        else
        {
            if ($string)
            {
                $searchKeys = $this->searchKeys;
                $this->options = $this->originalOptions->filter(function ($option) use ($string, $searchKeys) {

                    // FOR NOW ONLY SEARCHING ON FIRST KEY IF IT IS A CUSTOM ARRAY
                    $key = $searchKeys[0];
                    return false !== stristr($option->$key, $string);
                });
            } 
            else 
            {
                $this->options = $this->originalOptions;
            }
            
        }

        $this->showOptions = true;
    }


    public function leftJoinForSearch ($query)
    {
        if ($this->relationship)
        {
            $relationshipName = $this->relationship;
            $dummyRecord = $this->model::first();
            $localTable = $dummyRecord->getTable();
            $foreignTable = $dummyRecord->$relationshipName->getTable();

            $query = $query->leftJoin("$foreignTable", "{$localTable}.{$this->joinKey}", "{$foreignTable}.id");
        }

        return $query;
    }


    public function selectOption ($id, $inputText)
    {
        $this->search = $inputText;

        $this->options = $this->options->reject(function ($option) use ($id) {
            return $option->id != $id;
        });

        $this->emitUp('selectOptionChanged', $this->field, $id);
    }


    public function clearSearch ()
    {
        $this->search = '';
        
        if ($this->originalOptions)
        {
            $this->options = $this->originalOptions;
        }
        else
        {
            $this->options = $this->eagerLoadRelationship($this->removeScopesIfApplicable($this->model))->limit($this->limit)->get();
        }
        $this->showOptions = true;

        $this->emitUp('selectOptionChanged', $this->field);
    }


    public function loadRelationship ($item)
    {
        // check if item has relationship 
        if ($this->relationship)
        {
            $relationshipName = $this->relationship;

            if (isset($item->$relationshipName->full_name))
            {
                return $item->$relationshipName->full_name;
            }
            else if (isset($item->$relationshipName->first_name))
            {
                return $item->$relationshipName->first_name;
            }
            else if ((isset($item->$relationshipName->name)))
            {
                return $item->$relationshipName->name;
            }
            else 
            {   
                $key = $this->searchKeys[array_key_first($this->searchKeys)];

                return $item->$relationshipName->$key;
            }
            
        }
        else
        {
            return null;
        }
        
    }
}
