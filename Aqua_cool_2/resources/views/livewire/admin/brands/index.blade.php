<div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title fs-5" id="exampleModalLabel">Brand Delete</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="destroyBrand">
            <div class="modal-body">

              <h6>Are You sure you want to delete this data?</h6>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Yes. Delete</button>
            </div>
        </form>

          </div>
        </div>
      </div>

<div>

    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Brands
                        <a href="{{ url('admin/brands/create') }}" class="btn btn-primary btn-sm float-end">Add Brand</a>
                    </h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Brand_Name</th>
                                <th>Brand_Slug</th>
                                <th>Brand_Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($brands as $brand)

                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>{{ $brand->brand_slug }}</td>
                                <td>
                                    <img src="{{ asset('/uploads/brands/'.$brand->brand_image) }}" width="400px" height="400px"/>
                                </td>

                                <td>{{ $brand->status == '1' ? 'Hidden':'Visible' }}</td>

                                <td>
                                    <a href="{{ url('admin/brands/'.$brand->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    {{-- <a href="" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a> --}}
                                    <a href="#" wire:click="deleteBrand({{ $brand->id }})" data-toggle="modal" data-target="#deleteModal_1" class="btn btn-danger">Delete</a>
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

</div>

</div>

@push('script')
<script>
    window.addEventListener('open-delete-modal', () => {
        $('#deleteModal_1').modal('show');
    });

    window.addEventListener('close-modal', () => {
        $('#deleteModal_1').modal('hide');
    });
</script>
@endpush

