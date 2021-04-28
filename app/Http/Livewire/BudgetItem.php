<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Crud\LivewireCrud;
use App\Models\Item;


class BudgetItem extends LivewireCrud
{
   
    public function mount()
    {
        $this->model = new Item;
    }


    public function render()
    {
        return view('livewire.budget-item.budget', [
            'records' => $this->recordsQuery,
        ])->extends('layouts.master');
    }


}
