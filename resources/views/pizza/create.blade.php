<x-layout>
    <x-slot name="title">
        Pizza House | Add New Pizza
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <x-MenuNav />

            <div class="col-md-9">
                <form action="{{route('pizza.store')}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">Pizza</div>

                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}"
                                    placeholder="name of pizza">
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control"
                                    placeholder="description of pizza">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group mb-3 d-flex align-items-center">
                                <div class="me-3">
                                    <label>Pizza price($)</label>
                                </div>
                                <div class="mx-2">
                                    <input type="number" name="small_pizza_price" class="form-control"
                                        value="{{old('small_pizza_price')}}" placeholder="small pizza price">
                                </div>
                                <div class="mx-2">
                                    <input type="number" name="medium_pizza_price" class="form-control"
                                        value="{{old('medium_pizza_price')}}" placeholder="medium pizza price">
                                </div>
                                <div class="mx-2">
                                    <input type="number" name="large_pizza_price" class="form-control"
                                        value="{{old('large_pizza_price')}}" placeholder="large pizza price">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Choose Category</option>
                                    @forelse ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @empty
                                    <option value="" disabled>Empty Category</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
