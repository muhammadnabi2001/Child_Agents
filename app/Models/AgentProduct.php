<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentProduct extends Model
{
    protected $fillable=[
        'parent_id',
        'product_id',
        'price'
    ];
}
