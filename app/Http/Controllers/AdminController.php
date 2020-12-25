<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller {

    public function store(Request $request) {
        $array = array('product_name' => $request->product_name, 'first_spec' => $request->first_spec, 'second_spec' => $request->second_spec, 'third_spec' => $request->third_spec, 'product_price' => $request->product_price, 'product_stock' => $request->product_stock, 'product_type' => $request->product_type,'picture' => $request->picture);
        $validator = Validator::make($array, [
            'product_name' => ['required', 'string'],
            'first_spec' => ['required', 'string'],
            'second_spec' => ['required', 'string'],
            'third_spec' => ['required', 'string'],
            'product_price' => ['required', 'between:0,100000.00'],
            'product_stock' => ['required', 'integer', 'min:1'],
            'product_type' => ['required'],
            'picture' => ['required']

        ]);
        if ($validator->fails()) {
            return redirect('/form')->withErrors($validator)->withInput();
        } else {
            $product = new Product();
            $product->name = $request->product_name;
            $product->firstSpecification = $request->first_spec;
            $product->secondSpecification = $request->second_spec;
            $product->thirdSpecification = $request->third_spec;
            $product->type = $request->product_type;
            $product->price = $request->product_price;
            $product->stock = $request->product_stock;
            $product->picture = file_get_contents($request->picture);
            $product->save();
        }
        return redirect('/form');
    }   

    public function idexAllProducts() {
        $products = Product::paginate(1);
        return view('/form',['products' => $products]);
    }

    public function create()
    {
        return view('form');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin');
    }
}
