<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResourse extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

       //dd($id);

        return [
            'name' => $this->product_name,
            'price' => $this->product_price,
            'price' => $this->product_price
        ];
    }
}
