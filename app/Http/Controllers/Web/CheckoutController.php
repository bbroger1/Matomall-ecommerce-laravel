<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        $carts=session()->get('cart');
        if(!auth()->check()){
           return redirect()->route('login');
        }else{
            return view('web.checkout',compact(['carts']));
        }
    }
}
