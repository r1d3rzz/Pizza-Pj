<x-layout>
    <x-slot name="title">
        Pizza House | Dashboard
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <x-MenuNav />
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>Pizza House</div>
                        <div>
                            <form action="{{route('pizza.create')}}">
                                <button class="btn btn-secondary btn-sm">Add Pizza</button>
                            </form>
                        </div>
                    </div>

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
                                {{-- @foreach ($pizzas as $key => $pizza)
                                <tr>
                                    <th scope="row">{{$pizza->id}}</th>
                                    <td><img src="{{Storage::url($pizza->image)}}" width="80" alt=""></td>
                                    <td>{{$pizza->name}}</td>
                                    <td>{{$pizza->description}}</td>
                                    <td>${{$pizza->small_pizza_price}}.00</td>
                                    <td>${{$pizza->small_pizza_price}}.00</td>
                                    <td>${{$pizza->small_pizza_price}}.00</td>
                                    <td>{{$pizza->category}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal_{{$pizza->id}}">
                                            Delete
                                        </button>
                                    </td>
                                    <div class="modal fade" id="exampleModal_{{$pizza->id}}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">
                                                        Delete comfirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you Sure to Delete this Item No.
                                                    <strong>{{$pizza->id}}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('pizza.destroy',$pizza->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td>
                                        <form action="{{route('pizza.edit',$pizza->id)}}">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach --}}

                                @forelse ($pizzas as $pizza)
                                <tr>
                                    <th scope="row">{{$pizza->id}}</th>
                                    <td><img src="{{Storage::url($pizza->image)}}" width="80" class="rounded" alt="">
                                    </td>
                                    <td>{{$pizza->name}}</td>
                                    <td>{{$pizza->description}}</td>
                                    <td>${{$pizza->small_pizza_price}}.00</td>
                                    <td>${{$pizza->medium_pizza_price}}.00</td>
                                    <td>${{$pizza->large_pizza_price}}.00</td>
                                    <td>{{$pizza->category->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal_{{$pizza->id}}">
                                            Delete
                                        </button>
                                    </td>
                                    <div class="modal fade" id="exampleModal_{{$pizza->id}}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">
                                                        Delete comfirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you Sure to Delete this Item No.
                                                    <strong>{{$pizza->id}}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('pizza.destroy',$pizza->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td>
                                        <form action="{{route('pizza.edit',$pizza->id)}}">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-warning">Empty Items!</div>
                                @endforelse
                            </tbody>
                        </table>
                        {{$pizzas->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
