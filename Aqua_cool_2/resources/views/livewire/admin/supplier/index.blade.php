
<div>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Supplier Delete</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form wire:submit.prevent="destroySupplier">
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
            <h3 class="alert- alert-success mb-2">{{ session('message') }}</h3>
             @endif

            <div class="card">
                <div class="card-header">
                    <h3>Suppliers
                        <a href="{{ url('admin/supplier/create') }}" class="btn btn-primary btn-sm float-end">Add Supplier</a>
                    </h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Company</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($supplier as $suppli)
                            <tr>
                                <td>{{ $suppli->id }}</td>
                                <td>{{ $suppli->name }}</td>
                                <td>{{ $suppli->city }}</td>
                                <td>{{ $suppli->adress }}</td>
                                <td>{{ $suppli->email }}</td>
                                <td>{{ $suppli->phone }}</td>
                                <td>{{ $suppli->description }}</td>

                                <td>
                                   <a href="{{ url('admin/supplier/'.$suppli->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                   <a href="#" wire:click="deleteSupplier({{ $suppli->id }})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm">Delete</a>
                                </td>
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

</div>
</div>

@push('script')
<script>
    window.addEventListener('open-delete-modal', () => {
        $('#deleteModal').modal('show');
    });

    window.addEventListener('close-modal', () => {
        $('#deleteModal').modal('hide');
    });
</script>
@endpush
