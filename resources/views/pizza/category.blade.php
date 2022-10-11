<x-layout>
    <x-slot name="title">
        Pizza House | Category
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <x-MenuNav />

            <div class="col-md-9">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">Pizza Category</div>

                        <div class="card-body">
                            @if (session('message'))
                            <div class="alert alert-warning">{{session('message')}}</div>
                            @endif
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white">
                                            Create New Category
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('category.store')}}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name">Name</label>
                                                    <input name="name" type="text" id="name" class="form-control">
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-sm btn-primary">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-header bg-danger text-white">
                                            Categories
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group">
                                                @forelse ($categories as $category)
                                                <li class="list-group-item list-group-item-action">
                                                    {{$category->name}}
                                                </li>
                                                @empty
                                                <div class="alert alert-warning">
                                                    No Category!
                                                </div>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
