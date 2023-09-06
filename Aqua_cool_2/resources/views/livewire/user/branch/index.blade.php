
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Our Branches</h2>
                <hr>
                <a href="{{ url('/user/dashboard') }}" class="btn btn-danger btn-sm float-end">Go Back</a>
            </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Branch</th>
                                <th>District</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $branch->name }}</td>
                                <td>{{ $branch->district }}</td>
                                <td>{{ $branch->city }}</td>
                                <td>{{ $branch->adress }}</td>
                                <td>{{ $branch->email }}</td>
                                <td>{{ $branch->phone }}</td>

                                <td>
                                    <img src="{{ asset('/uploads/branch/'.$branch->image) }}" width="300px" height="300px"/>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                <div>
                    {{ $branches->links() }}
                </div>

                </div>

        </div>
    </div>
</div>
