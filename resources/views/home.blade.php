<x-layout>
    <x-slot name="title">
        Pizza House | Your Orders
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Your Orders
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
                                    <td>{{$order->pizza->name}}</td>
                                    <td>{{$order->small_pizza}}</td>
                                    <td>{{$order->medium_pizza}}</td>
                                    <td>{{$order->large_pizza}}</td>
                                    <td>$<strong>{{$order->pizza->small_pizza_price * $order->small_pizza +
                                            $order->pizza->medium_pizza_price * $order->medium_pizza +
                                            $order->pizza->large_pizza_price * $order->large_pizza}}</strong>.00</td>
                                    <td>{{$order->date}}/{{$order->time}}</td>
                                    <td>{{$order->body}}</td>
                                    <td>{{$order->status}}</td>
                                </tr>

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
