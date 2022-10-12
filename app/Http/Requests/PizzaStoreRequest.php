<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PizzaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3','max:50'],
            'description' => ['required','min:3','max:500'],
            'small_pizza_price' => ['required','numeric'],
            'medium_pizza_price' => ['required','numeric'],
            'large_pizza_price' => ['required','numeric'],
            'category_id' => ['required',Rule::exists('categories','id')],
            'image' => ['required','mimes:png,jpg,jepg'],
        ];
    }
}
