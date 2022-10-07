<x-layout>
    <x-slot name="title">
        Orders
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">S.Pizza</th>
                                    <th scope="col">M.Pizza</th>
                                    <th scope="col">L.Pizza</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td><input type="submit" value="pending" class="btn btn-sm btn-warning"></td>
                                    <td><input type="submit" value="confirm" class="btn btn-sm btn-primary"></td>
                                    <td><input type="submit" value="reject" class="btn btn-sm btn-danger"></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
