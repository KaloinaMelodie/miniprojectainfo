<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uti;
use Illuminate\Support\Str;


class UtiController extends Controller
{
    public function login(Request $request)
    {

        $uti=new Uti();
        $iduti=$uti->checklog($request->all());

        if($iduti!=0){
           session(['uti'=>$iduti]); 
           session(['utiname'=>strtolower(trim($request['identifiant']))]); 
        }else {
            return view('/BO/Login',['error'=>'Oops! Your username or password is incorrect. Please try again.']);
        }
        return redirect('/ainfobo/articles/create');
    }

    public function deconnect()
    {
        session()->forget('uti');
        session()->forget('utiname');
        return redirect('/ainfobo/');
    }

}
