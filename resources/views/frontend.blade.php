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
                            <form action="{{route('frontend')}}">
                                <a href="{{route('frontend')}}" class="list-group-item list-group-item-action">All
                                    Pizzas</a>
                                <input type="submit" value="vegetarian" name="category"
                                    class="list-group-item list-group-item-action">
                                <input type="submit" value="nonvegetarian" name="category"
                                    class="list-group-item list-group-item-action">
                                <input type="submit" value="traditional" name="category"
                                    class="list-group-item list-group-item-action">
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white d-flex justify-content-between">
                        <div>Pizza House</div>
                        <div>Total ({{count($pizzas)}})</div>
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
