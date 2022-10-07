<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend',[
            'pizzas' => Pizza::latest()->get(),
        ]);
    }

    public function show($id){
        $pizza = Pizza::find($id);
        return view('show',[
            'pizza' => $pizza,
        ]);
    }
}
