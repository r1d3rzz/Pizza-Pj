<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Mail\CustomerOrderMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(Request $request){
        if(!$request->category_id){
            return view('frontend',[
                'pizzas' => Pizza::latest()->filter(request(['category','search']))->get(),
                'categories' => Category::get()
            ]);
        }
        return view('frontend',[
            'pizzas' => Pizza::latest()->where('category_id',$request->category)->get(),
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

        $customer_name = auth()->user()->name;
        $pizza_name = $request->pizzaName;

        if(!auth()->user()->is_admin){
            Mail::to(auth()->user()->email)->queue(new CustomerOrderMail($customer_name,$pizza_name));
        }

        return back()->with('message','Thanks for your Order.');
    }
}
