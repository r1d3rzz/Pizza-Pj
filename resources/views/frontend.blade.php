<x-layout>
    <x-slot name="title">
        Pizza House
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-white">Menu</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">Category 1</li>
                            <li class="list-group-item list-group-item-action">Category 2</li>
                            <li class="list-group-item list-group-item-action">Category 3</li>
                            <li class="list-group-item list-group-item-action">Category 4</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        Pizza
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($pizzas as $pizza)
                            <div class="col-md-4 my-2">
                                <div class="card" style="width: 18rem; height: 100%;">
                                    <img src="{{Storage::url($pizza->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pizza->name}}</h5>
                                        <p class="card-text mb-3">{{$pizza->description}}</p>

                                        <div class="d-flex justify-content-center">
                                            <a href="{{route('pizza.order',$pizza->id)}}">
                                                <button class="btn btn-danger">Order Now</button>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning">Empty Pizza</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<style>
    .list-group-item:hover {
        background-color: #DC3545;
        color: white;
    }
</style>
