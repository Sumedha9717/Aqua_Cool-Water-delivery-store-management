
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Our Suppliers</h2>
                <hr>
                <a href="{{ url('/user/dashboard') }}" class="btn btn-danger btn-sm float-end">Go Back</a>
            </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Company</th>
                                <th>Address</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($supplier as $suppli)
                            <tr>
                                <td>{{ $suppli->name }}</td>
                                <td>{{ $suppli->adress }}</td>
                                <td>{{ $suppli->description }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div>
                        {{ $supplier->links() }}
                    </div>


                </div>

        </div>
    </div>
</div>
