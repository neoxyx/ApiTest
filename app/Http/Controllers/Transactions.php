<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class Transactions extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        if ($products->stock < 1) {
            $products = [];
            return response()->json($products);
        } else {
            $products->stock = $products->stock - 1;
            $products->save();
            return response()->json($products);
        }
    }
}
