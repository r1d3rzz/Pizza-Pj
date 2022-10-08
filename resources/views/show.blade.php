<x-layout>
    <x-slot name="title">
        Order | {{$pizza->name}}
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-white">Order</div>

                    <div class="card-body">
                        @auth
                        <form action="{{route('order.store')}}" method="POST">
                            @csrf
                            <p><input name="pizza_id" type="text" value="{{$pizza->id}}" class="form-control" hidden>
                            </p>
                            <p>Name : <b>{{auth()->user()->name}}</b></p>

                            <p>Email : <b>{{auth()->user()->email}}</b></p>

                            <p><label for="phone">Phone No.</label> <input name="phone" id="phone" type="text"
                                    placeholder="phone no." class="form-control" value="{{old('phone')}}"></p>

                            <p><label for="s.pizza">Small Pizza : </label> <input name="small_pizza" id="s.pizza"
                                    type="number" value="{{old('small_pizza',0)}}" class="form-control w-25 d-inline">
                            </p>

                            <p><label for="m.pizza">Medium Pizza : </label> <input name="medium_pizza" id="m.pizza"
                                    type="number" value="{{old('medium_pizza',0)}}" class="form-control w-25 d-inline">
                            </p>

                            <p><label for="l.pizza">Large Pizza : </label> <input name="large_pizza" id="l.pizza"
                                    type="number" value="{{old('large_pizza',0)}}" class="form-control w-25 d-inline">
                            </p>

                            <p><input type="time" class="form-control" name="time" id="" value="{{old('time')}}"></p>

                            <p><input type="date" class="form-control" name="date" id="" value="{{old('date')}}"></p>

                            <p><textarea name="body" id="" cols="30" rows="3" class="form-control"
                                    placeholder="message"></textarea></p>

                            <div class="d-flex justify-content-center mt-3">
                                <div>
                                    <button type="submit" class="btn btn-danger">Make Order</button>
                                </div>
                            </div>
                        </form>
                        @if (count($errors)>0)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger my-3">
                            {{$error}}
                        </div>
                        @endforeach
                        @endif
                        @if (session('errorMessage'))
                        <div class="alert alert-danger my-3">
                            {{session('errorMessage')}}
                        </div>
                        @endif
                        @if (session('message'))
                        <div class="alert alert-success my-3">
                            {{session('message')}}
                        </div>
                        @endif
                        @else
                        <div>
                            <a href="{{route('login')}}">Please Login First</a>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white">Pizza Name : <b> {{$pizza->name}}</b></div>
                    <div class="card-body">
                        <img src="{{Storage::url($pizza->image)}}" width="100%" class="mb-3" alt="">
                        <h3>{{$pizza->name}}</h3>
                        <p>{{$pizza->description}}.00</p>
                        <p>Small Pizza Price - <b>${{$pizza->small_pizza_price}}.00</b></p>
                        <p>Medium Pizza Price - <b>${{$pizza->medium_pizza_price}}.00</b></p>
                        <p>Large Pizza Price - <b>${{$pizza->large_pizza_price}}.00</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
