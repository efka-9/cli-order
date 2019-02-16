<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class OrderModel extends Eloquent
{
	public $table = 'orders';
	
    protected $fillable = [
        'email', 
        'meal', 
        'comment'
    ];
}