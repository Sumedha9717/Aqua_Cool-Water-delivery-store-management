
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Category</h2>
                <hr>
                <a href="{{ url('/user/dashboard') }}" class="btn btn-danger btn-sm float-end">Go Back</a>
            </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Category_Name</th>
                                <th>Description</th>
                                <th>Image</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($categories as $category)

                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    {{-- <img src="{{ asset('/uploads/category/'.$category->image) }}" width="400px" height="400px"/> --}}
                                    <img src="{{asset ("$category->image")}}" style="width:70px; height:70px" alt="slider">
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                    <div>
                        {{ $categories->links() }}
                    </div>

                </div>

        </div>
    </div>
</div>
