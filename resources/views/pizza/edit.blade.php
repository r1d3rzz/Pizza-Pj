<x-layout>
    <x-slot name="title">
        Pizza | Edit
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <form action="{{route('pizza.update',$pizza->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">Edit Pizza <strong>(Item No.{{$pizza->id}})</strong></div>

                        <div class="card-body">
                            @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{old('name',$pizza->name)}}" placeholder="name of pizza">
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control"
                                    placeholder="name of pizza">{{old('description',$pizza->description)}}</textarea>
                            </div>

                            <div class="form-group mb-3 d-flex align-items-center">
                                <div class="me-3">
                                    <label>Pizza price($)</label>
                                </div>
                                <div class="mx-2">
                                    <input type="number" name="small_pizza_price" class="form-control"
                                        value="{{old('small_pizza_price',$pizza->small_pizza_price)}}"
                                        placeholder="small pizza price">
                                </div>
                                <div class="mx-2">
                                    <input type="number" name="medium_pizza_price" class="form-control"
                                        value="{{old('medium_pizza_price',$pizza->medium_pizza_price)}}"
                                        placeholder="medium pizza price">
                                </div>
                                <div class="mx-2">
                                    <input type="number" name="large_pizza_price" class="form-control"
                                        value="{{old('large_pizza_price',$pizza->large_pizza_price)}}"
                                        placeholder="large pizza price">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                    <option {{$category->id == old('category_id',$pizza->category->id) ? 'selected' :
                                        ''}} value="{{$category->id}}">{{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img src="{{Storage::url($pizza->image)}}" width="80" alt="">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout>
