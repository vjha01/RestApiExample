<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResourse;
use App\Model\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $postmanId = '';
        $requestHeader = $request->header();
       
        if(array_key_exists('postman-token', $requestHeader)){
            $postmanId = $requestHeader['postman-token'][0];
        }

        $notes = Products::all();
        $apiData = [

            "info"=> [
                    "_postman_id"=> $postmanId,
                    "name"=> "laravel",
                    "schema"=> "https://schema.getpostman.com/json/collection/v2.0.0/collection.json"
                ],  
            "item"=> [
                         [
                            "name"=> "Test API",
                            "request"=> [
                                            "method"=> $request->method(),
                                            "header"=> [$requestHeader],
                                            "body"=> [
                                                "mode"=> "formdata",
                                                "formdata"=> [
                                                    $notes
                                                ]
                                            ],
                                            "url"=> $request->fullUrl()
                                        ],
                                "response"=> [
                                    'Content-Type' => 'application/json',
                                    'code' => '200',
                                    'staus' =>'success']
                        ]
                    ]          
        ];

        return response($apiData)
         ->withHeaders([
                'Content-Type' => 'application/json',
                'X-Header-One' => 'Header Value',
                'code' => '200',
                'staus' =>'success'
            ]);

        //return response()->json([$apiData], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products,$id)
    {
        //
        //return $request;
        $note = Products::find($id); 
        return new ProductResourse($note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
        return $products;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
