<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function indexPhone(Request $request) {  
        if($request->input('select') == "HighToLow") {
            $phonesDesc = DB::table('products')->where('type','phone')->orderByDesc('price')->paginate(1);
            return view('/catalogue/phones', ['phones' => $phonesDesc]);
        }    
         $phones = DB::table('products')->where('type', 'phone')->paginate(1);
         return view('/catalogue/phones', ['phones' => $phones]);
    }

    public function indexGraphic() {
        $graphicCard = DB::table('products')->where('type', 'graphic')->paginate(1);
        return view('/catalogue/graphics', ['graphicCard' => $graphicCard]);
    }

    public function indexProcessor() {
        $processors = DB::table('products')->where('type', 'processor')->paginate(1);
        return view('/catalogue/processors', ['processors' => $processors]);
    }

    public function indexConsole() {
        $consoles = DB::table('products')->where('type', 'console')->paginate(1);
        return view('catalogue/consoles', ['console' => $consoles]);
    }

    public function indexSearch(Request $request) {
        $search = $request->input('search');
        $result = DB::table('products')->where('name','like','%'.$search.'%');
        return view('catalogue/displaySearch')->with('abc',$result->get()); //paginaçao nao está a funcionar aq
        
    }

    public function store(Request $request) {
        $product = new Product();
        $product->name = "IPHONE 12";
        $product->firstSpecification = "RAM: 6GB";
        $product->secondSpecification = "Battery: 3200 mAh";
        $product->thirdSpecification = "Camera: 10MP";
        $product->type = "phone";
        $product->price = 999.90;
        $product->stock = 40;
        $product->picture = file_get_contents($request->picture);
        $product->save();
        return redirect('/form');
    }

    public function create() {
        return view('form');
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
            if(!empty($cart[$id])) { // se produto existir no carrinho aumentar a quantidade
                $cart[$id][3]++;
                session()->put('shoppingCart',$cart);
                return redirect()->back()->with('sucess','Added to Cart Sucessfully!');
            } 
                // se não existir o item adiciona-lo ao carrinho com quantide 1
                $cart[$id] = [0 => $product->picture, 1 => $product->name, 2 => $product->price, 3 => 1, 4 => $product->id];
                session()->put('shoppingCart',$cart);
                return redirect()->back()->with('sucess','Added to Cart Sucessfully!');

        } else {
            return redirect()->back()->with('error', 'No Stock');
        }
        //stock --; qnd adicionado qnd removido --;
       }

       public function removeFromCart(Request $request) {
        if($request->idRemove) {
            $cart = session()->get('shoppingCart');
                if(isset($cart[$request->idRemove])) {
                    unset($cart[$request->idRemove]);
                    session()->put('shoppingCart',$cart);
                }
                session()->flash('sucess','Removed from Cart Sucessfully!');
                return redirect('account/shoppingCart');
        }
    }

    public function updateCart(Request $request) {
        if($request->idSub && $request->quantityProd && $request->quantityProd > 0) {
            $cart = session()->get('shoppingCart');
            $cart[$request->idSub][3] = $request->quantityProd; //alterar a quantidade
            session()->put('shoppingCart',$cart);
        }
        session()->flash('sucess','Updated from Cart Sucessfully!');
        return redirect('account/shoppingCart');
    }

}
