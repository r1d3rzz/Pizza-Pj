<x-layout>
    <x-slot name="title">
        Pizza House
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Pizza House') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">S.Price</th>
                                    <th scope="col">M.Price</th>
                                    <th scope="col">L.Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col" class="text-center" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pizzas as $key => $pizza)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><img src="{{Storage::url($pizza->image)}}" width="80" alt=""></td>
                                    <td>{{$pizza->name}}</td>
                                    <td>{{$pizza->description}}</td>
                                    <td>${{$pizza->small_pizza_price}}.00</td>
                                    <td>${{$pizza->small_pizza_price}}.00</td>
                                    <td>${{$pizza->small_pizza_price}}.00</td>
                                    <td>{{$pizza->category}}</td>
                                    <td><button class="btn btn-sm btn-danger">Delete</button></td>
                                    <td><button class="btn btn-sm btn-primary">Edit</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
