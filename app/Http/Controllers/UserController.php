<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('/account/login');
    }

    public function updateMorada(Request $request)
    {
        $id = Auth::id();
        $user = User::findorFail($id);  // encontrar o user por id (como receber este id aq) 
        $array = array('streetName' => $request->streetName, 'doorNumber' => $request->doorNumber, 'floor' => $request->floor, 'zipcode' => $request->zipcode);

        $validator =  Validator::make($array, [ //validacao das variaveis retiradas do formulario
            'streetName' => ['required', 'string'],
            'doorNumber' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'zipcode' => ['required', 'string', 'regex:/^\d{4}-\d{3}?$/']
        ]);
        if ($validator->fails()) {
            return redirect('account/addAddress')->withErrors($validator)->withInput();
        } else {
            $user->streetName = $request->streetName;
            $user->doorNumber = $request->doorNumber;
            $user->floor = $request->floor;
            $user->zipcode = $request->zipcode;
            $user->save();
        }
        return redirect('/account/settings');
    }

    public function indexMorada() {
        $id = Auth::id();
        $user = User::findorFail($id);
        $array = array($user->streetName, $user->doorNumber, $user->floor, $user->zipcode,$user->name);
        if (URL::current() === 'http://127.0.0.1:8000/account/settings') {
            return view('/account/settings', ['address' => $array]);
        } 
        if (URL::current() === 'http://127.0.0.1:8000/account/addAddress') {
            return view('/account/addAddress', ['address' => $array]);
        } 
            return view('account/checkout', ['address' => $array]);
    }

    public function isAdmin() {
        $id = Auth::id();
        $user = User::findorFail($id);
        return $user->type === 'admin';
    }
}
