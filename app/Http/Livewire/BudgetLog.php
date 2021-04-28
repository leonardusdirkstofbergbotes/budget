<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Log;

class BudgetLog extends Component
{
    public function render()
    {
        return view('livewire.budget-log.budget_log')
            ->extends('layouts.master');
    }
}
