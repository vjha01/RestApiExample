<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
		'product_name','product_price'
	];
    
}
