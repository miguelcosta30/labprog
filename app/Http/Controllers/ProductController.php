<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
define("PAGINATON",1);

class ProductController extends Controller
{

    protected function checkOrder(Request $request, $type)
    {
        if ($request->input('select') == "HighToLow") {
            $desc = DB::table('products')->where('type', $type)->orderByDesc('price')->paginate(PAGINATON);
            return $desc;
        }
        if ($request->input('select') == "LowToHigh") {
            $asc = DB::table('products')->where('type', $type)->orderBy('price', 'ASC')->paginate(PAGINATON);
            return $asc;
        }
        if ($request->input('select') == "NewestToOldest") {
            $new = Product::where('type', $type)->latest()->paginate(PAGINATON);
            return $new;
        }
        if ($request->input('select') == "OldestToNewest") {
            $old = Product::where('type', $type)->oldest()->paginate(PAGINATON);
            return $old;
        }
        return null;
    }

    public function indexMainPage() {
        $phones = DB::table('products')->where('type','phone')->limit(4);
        $proc = DB::table('products')->where('type','processor')->limit(4);
        $phones = $phones->get();
        $proc = $proc->get();
        $array = [
            'phones' => $phones,
            'processor'=> $proc
        ];
        return view('mainpage',['array' => $array]); 
    } 

    public function indexPhone(Request $request)
    {
        if ($this->checkOrder($request, 'phone') != null) {
            $aux = $this->checkOrder($request, 'phone');
            return view('/catalogue/phones', ['phones' => $aux]);
        }
        $phones = DB::table('products')->where('type', 'phone')->paginate(PAGINATON);
        return view('/catalogue/phones', ['phones' => $phones]);
    }

    public function indexGraphic(Request $request)
    {
        if ($aux = $this->checkOrder($request, 'graphic') != null) {
            $aux = $this->checkOrder($request, 'graphic');
            return view('/catalogue/graphics', ['graphicCard' => $aux]);
        }
        $graphicCard = DB::table('products')->where('type', 'graphic')->paginate(PAGINATON);
        return view('/catalogue/graphics', ['graphicCard' => $graphicCard]);
    }

    public function indexProcessor(Request $request) {
        if ($aux = $this->checkOrder($request, 'processor') != null) {
            $aux = $this->checkOrder($request, 'processor');
            return view('/catalogue/processors', ['processors' => $aux]);
        }
        $processors = DB::table('products')->where('type', 'processor')->paginate(PAGINATON);
        return view('/catalogue/processors', ['processors' => $processors]);
    }

    public function indexConsole(Request $request) {
        if ($aux = $this->checkOrder($request, 'console') != null) {
            $aux = $this->checkOrder($request, 'console');
            return view('/catalogue/consoles', ['console' => $aux]);
        }
        $consoles = DB::table('products')->where('type', 'console')->paginate(PAGINATON);
        return view('catalogue/consoles', ['console' => $consoles]);
    }

    public function indexSearch(Request $request) {
        $search = $request->input('search');
        $result = DB::table('products')->where('name', 'like', '%' . $search . '%');
        return view('catalogue/displaySearch')->with('abc', $result->paginate(PAGINATON)); //paginaçao nao está a funcionar aq
    }

    public function addToCart($id) {
        $product = Product::findorFail($id);
        $cart = session()->get('shoppingCart'); //ir buscar á sessão o nosso carinho
        if ($product->stock > 0) {
            if (!$cart) { //se carrinho não existir criar [3] => quantidade
                $cart = [$id => [0 => $product->picture, 1 => $product->name, 2 => $product->price, 3 => 1, 4 => $product->id]];
                session()->put('shoppingCart', $cart); // guardar o carrinho na pos shoppingCart da sessao
                return redirect()->back()->with('sucess', 'Added to Cart Sucessfully!');
            }
            if (!empty($cart[$id])) { // se produto existir no carrinho aumentar a quantidade
                $cart[$id][3]++;
                session()->put('shoppingCart', $cart);
                return redirect()->back()->with('sucess', 'Added to Cart Sucessfully!');
            }
            // se não existir o item adiciona-lo ao carrinho com quantide 1
            $cart[$id] = [0 => $product->picture, 1 => $product->name, 2 => $product->price, 3 => 1, 4 => $product->id];
            session()->put('shoppingCart', $cart);
            return redirect()->back()->with('sucess', 'Added to Cart Sucessfully!');
        } else {
            return redirect()->back()->with('error', 'No Stock');
        }
        //stock --; qnd adicionado qnd removido --;
    }

    public function removeFromCart(Request $request)
    {
        if ($request->idRemove) {
            $cart = session()->get('shoppingCart');
            if (isset($cart[$request->idRemove])) {
                unset($cart[$request->idRemove]);
                session()->put('shoppingCart', $cart);
            }
            session()->flash('sucess', 'Removed from Cart Sucessfully!');
            return redirect('account/shoppingCart');
        }
    }

    public function updateCart(Request $request)
    {
        if ($request->idSub && $request->quantityProd && $request->quantityProd > 0) {
            $cart = session()->get('shoppingCart');
            $cart[$request->idSub][3] = $request->quantityProd; //alterar a quantidade
            session()->put('shoppingCart', $cart);
        }
        session()->flash('sucess', 'Updated from Cart Sucessfully!');
        return redirect('account/shoppingCart');
    }

         
        

}
