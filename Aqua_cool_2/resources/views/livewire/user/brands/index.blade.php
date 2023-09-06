
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Brands</h2>
                <hr>
                <a href="{{ url('/user/dashboard') }}" class="btn btn-danger btn-sm float-end">Go Back</a>
            </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Brand_Name</th>
                                <th>Brand_Image</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($brands as $brand)

                            <tr>
                                <td>{{ $brand->brand_name }}</td>
                                <td>
                                    <img src="{{ asset('/uploads/brands/'.$brand->brand_image) }}" width="400px" height="400px"/>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                        <div>
                        {{ $brands->links() }}
                        </div>

                </div>

        </div>
    </div>
</div>
