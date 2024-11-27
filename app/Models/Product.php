<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function agents()
{
    return $this->belongsToMany(Agent::class, 'agent_products', 'product_id', 'parent_id');
}

}
