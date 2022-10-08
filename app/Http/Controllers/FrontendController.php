<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
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

    public function store(OrderStoreRequest $request)
    {
        if($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0){
            return back()->with('errorMessage','Please order at least one pizza');
        }

        if($request->small_pizza < 0 || $request->medium_pizza < 0 || $request->large_pizza < 0){
            return back()->with('errorMessage','Order should not have negative number');
        }

        Order::create([
            'user_id' => auth()->id(),
            'phone' => $request->phone,
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
            'date' => $request->date,
            'time' => $request->time,
            'body' => $request->body
        ]);

        return back()->with('message','Thanks for your Order.');
    }
}
