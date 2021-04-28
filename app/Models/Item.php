<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $table = 'budget_item';
    public $guarded = [];

    
    public function category ()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    protected $casts = [
        'model.name' => 'sting',
        'model.amount' => 'integer',
        'model.category_id' => 'integer',
        'model.payment_date' => 'date',
        'model.should_alert' => 'boolean',
        'model.order' => 'integer'
    ];


    public $rules = [
        'model.name' => 'required|string',
        'model.amount' => 'required|integer',
        'model.category_id' => 'nullable|integer',
        'model.payment_date' => 'nullable|date',
        'model.should_alert' => 'nullable|boolean',
        'model.order' => 'nullable|integer'
    ];


    public function defaultFieldValues ()
    {
        return [
            'should_alert' => false
        ];
    }
}
