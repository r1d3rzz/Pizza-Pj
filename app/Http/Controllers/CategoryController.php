<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(){
        return view('pizza.category',[
            'categories' => Category::latest()->get()
        ]);
    }

    public function store(){
        $formData = request()->validate([
            'name'=>['required','min:3',Rule::unique('categories','name')]
        ]);
        Category::create($formData);

        return back()->with('message','New Category is Successfully Created');
    }
}
