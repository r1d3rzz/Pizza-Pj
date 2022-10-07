<div class="col-md-3">
    <div class="card">
        <div class="card-header">Menu</div>

        <div class="card-body">
            <div class="form-group">
                <ul class="list-group">
                    <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                    <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Add</a>
                    <a href="{{route('user.order')}}" class="list-group-item list-group-item-action">User Orders</a>
                </ul>
            </div>
        </div>
    </div>

    @if (count($errors)>0)
    <div class="card mt-3">
        <div class="card-body">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div class="py-1">{{$error}}</div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
