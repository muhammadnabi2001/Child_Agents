<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $models=Product::orderBy('id','desc')->paginate(10);
        return view('Product.product',['models'=>$models]);
    }
    public function createproduct()
    {
        return view('Product.productcreate');
    }
    public function productstore(ProductStoreRequest $request)
    {
        $data=$request->validated();
        //dd($data['name']);
        $product=new Product();
        $product->name=$data['name'];
        $product->save();
        return redirect('product')->with('success',"Ma'lumot muvvafaqiyatli qo'shildi");
    }
}
