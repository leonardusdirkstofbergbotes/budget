<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Crud\LivewireCrud;
use App\Models\Log;

class BudgetLog extends LivewireCrud
{
    
    public function mount()
    {
        $this->model = new Log;
    }

    public function render()
    {
        return view('livewire.budget-log.budget_log', [
            'records' => $this->recordsQuery
        ])
            ->extends('layouts.master');
    }

    
}
