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
                                    <th scope="col" class="text-center" colspan="3">Action</th>
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
                                    <td>{{$order->status}}</td>
                                    <form action="{{route('order.status',$order->id)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <td><input type="submit" name="status" value="pending"
                                                class="btn btn-sm btn-warning"></td>
                                        <td><input type="submit" name="status" value="confirm"
                                                class="btn btn-sm btn-primary"></td>
                                        <td><input type="submit" name="status" value="reject"
                                                class="btn btn-sm btn-danger"></td>
                                    </form>
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
