<x-layout>
    <x-slot name="title">
        Pizza House | Category
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <x-MenuNav />

            <div class="col-md-9">
                <form action="{{route('pizza.store')}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">Pizza Category</div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white">
                                            Create New Category
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" class="form-control">
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-sm btn-primary">Add</button>
                                            </div>
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
                                                <li class="list-group-item list-group-item-action">Test</li>
                                                <li class="list-group-item list-group-item-action">Test</li>
                                                <li class="list-group-item list-group-item-action">Test</li>
                                                <li class="list-group-item list-group-item-action">Test</li>
                                                <li class="list-group-item list-group-item-action">Test</li>
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
