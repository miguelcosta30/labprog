<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function sendEmail($prod, $total)
    {
        $id = Auth::id();
        $user = User::findorFail($id);
        $data = [
            'name' => $user->name,
            'streetName' => $user->streetName,
            'doorNumber' => $user->doorNumber,
            'floor' => $user->floor,
            'zipcode' => $user->zipcode,
            'total' => $total,
            'prod' => $prod,
            'email' => $user->email,
            'title' => 'Online Store | Invoice'
        ];
        $pdf = PDF::loadview('account/invoice', $data);
        Mail::send('account/invoice', $data, function($message)use($data,$pdf) {
            $message->to($data["email"])
            ->subject($data["title"])
            ->attachData($pdf->output(), "invoice.pdf");
            });
  
        return redirect('/');
    }

    public function createOrder(Request $request)
    { // VER O STOCK
        if (!empty($request->payed)) { //verificar se foi pago
            error_log("teste");
            $id = Auth::id();
            $user = User::findorFail($id);
            if ($user->streetName != null) {
                $prod = $request->session()->get('shoppingCart'); //Ir buscar o carrinho do cliente á sessão
                if (!empty($prod)) {
                    if ($prod != null) {
                        $total = 0;
                        foreach ($prod as $idP => $aux) {
                            $aux = Product::findorFail($idP); //encontrar o produto com aquele id
                            if ($aux->stock > 0) {
                                if ($aux->stock - $prod[$idP][3] >= 0) { // CASO O NUMERO QUE QUEREMOS COMPRAR SEJA MAIOR QUE O DISPONIVEL
                                    $aux->stock -= $prod[$idP][3];
                                    $total += $prod[$idP][3] * $prod[$idP][2];
                                    $aux->save();
                                } else {
                                    return redirect()->back()->withErrors('We only have ' . $aux->stock . ' ' .  $aux->name . ' left. Please either Reduce the Quatity of the Prodcut or return Later');
                                }
                            } else {
                                return redirect()->back()->withErrors('No stock Avaliable');
                            }
                        }
                        $order = new Orders();
                        $order->user_id = $id;
                        $order->total = $total;
                        $this->sendEmail($prod, $total); //TO-DO
                        $order->save();
                        $request->session()->forget('shoppingCart');
                        return redirect('/');
                    }
                } else {
                    return redirect()->back()->withErrors('You have to add to your card to buy something'); //done
                }
            } else {
                return redirect()->back()->withErrors('Please enter an Address');
            }
        } else {
            return redirect()->back()->withErrors('You have to pay for the Order First'); //done
        }
        return redirect('account/checkout');
    }
}
