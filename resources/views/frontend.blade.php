<x-layout>
    <x-slot name="title">
        Pizza House
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-white">Menu</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">Category 1</li>
                            <li class="list-group-item list-group-item-action">Category 2</li>
                            <li class="list-group-item list-group-item-action">Category 3</li>
                            <li class="list-group-item list-group-item-action">Category 4</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        Pizza
                    </div>
                    <div class="card-body">
                        <div>
                            <p>Name</p>
                            <p>Description</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<style>
    .list-group-item:hover {
        background-color: #DC3545;
        color: white;
    }
</style>
