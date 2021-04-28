<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $table = 'budget_log';


    public function item ()
    {
        return $this->belongsTo(Item::class, 'budget_item_id');
    }


    /**
     * Calculate how many is left before reaching limit
     * 
     * @return integer
     */
    public function remains ()
    {
        return (int) $this->item->amount - $this->amount;
    }


    protected $casts = [
        'model.budget_item_id' => 'integer',
        'model.payment_date' => 'date',
        'model.amount' => 'integer'
    ];


    public $rules = [
        'model.budget_item_id' => 'nullable|integer',
        'model.payment_date' => 'nullable|date',
        'model.amount' => 'integer',
    ];
}
