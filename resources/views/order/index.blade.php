<x-layout>
    <x-slot name="title">
        Pizza House | Orders
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Orders
                        </div>
                        <div>
                            @if (count($orders)>0)
                            Total Order ({{count($orders)}})
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order_ID</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Email / Phone</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">S.Pizza</th>
                                    <th scope="col">M.Pizza</th>
                                    <th scope="col">L.Pizza</th>
                                    <th scope="col">Total($)</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <th>{{$order->user->name}}</th>
                                    <td>
                                        {{$order->user->email}} <br>
                                        {{$order->phone}}
                                    </td>
                                    <td>{{$order->pizza->description}}</td>
                                    <td>{{$order->small_pizza}} x <b>${{$order->pizza->small_pizza_price}}.00</b></td>
                                    <td>{{$order->medium_pizza}} x <b>${{$order->pizza->medium_pizza_price}}.00</b></td>
                                    <td>{{$order->large_pizza}} x <b>${{$order->pizza->large_pizza_price}}.00</b></td>
                                    <td>$<strong>{{$order->pizza->small_pizza_price * $order->small_pizza +
                                            $order->pizza->medium_pizza_price * $order->medium_pizza +
                                            $order->pizza->large_pizza_price * $order->large_pizza}}</strong>.00</td>
                                    <td>{{$order->date}}/{{$order->time}}</td>
                                    <td>{{$order->body}}</td>
                                    @if ($order->status === 'pending')
                                    <td>
                                        <form action="{{route('order.status',$order->id)}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button class="btn btn-sm btn-warning">pending</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        <form action="{{route('order.status',$order->id)}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button class="btn btn-sm btn-primary">confirm</button>
                                        </form>
                                    </td>
                                    @endif
                                    <td><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal_{{$order->id}}">delete</button></td>
                                </tr>

                                {{-- Model --}}
                                <div class="modal fade" id="exampleModal_{{$order->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Order No.
                                                    <b>{{$order->id}}</b>?
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to this order?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{route('order.delete',$order->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Model --}}

                                @empty
                                <div class="alert alert-warning">
                                    No Order!
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
