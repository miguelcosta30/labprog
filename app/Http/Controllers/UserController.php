<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
        public function store(Request $request) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return redirect('/account/login');
        }

    public function updateMorada (Request $request) {
        $id = Auth::id(); 
        $user = User::findorFail($id);  // encontrar o user por id (como receber este id aq) 
        $array = array('streetName' => $request->streetName,'doorNumber' => $request->doorNumber,'floor' => $request->floor,'zipcode' => $request->zipcode);

        $validator =  Validator::make($array, [ //validacao das variaveis retiradas do formulario
            'streetName' =>['required','string'],
            'doorNumber' =>['required','integer','min:0'],
            'floor' => ['required','integer','min:0'],
            'zipcode' => ['required','string','regex:/^\d{4}-\d{3}?$/']
        ]);
        if($validator->fails()) {
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
    
    
    public function indexMorada () {
        $id = Auth::id();
        $user = User::findorFail($id);
        $array = array($user->streetName,$user->doorNumber,$user->floor,$user->zipcode);
        return view('/account/settings',['address' => $array]);
    }

    
    }
