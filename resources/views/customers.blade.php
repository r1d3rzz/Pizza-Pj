<x-layout>
    <x-slot name="title">
        Pizza House | Customers
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">

            <x-MenuNav />

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Customers
                        </div>
                        <div>
                            @if (count($customers)>0)
                            Total Customers (<b>{{count($customers)}}</b>)
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Customers_ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Member since</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{Carbon\Carbon::parse($customer->created_at)->format('M d
                                        Y')}} (<b>{{$customer->created_at->diffForHumans()}}</b>)</td>
                                </tr>

                                @empty
                                <div class="alert alert-warning">
                                    Empty Coustomers
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
