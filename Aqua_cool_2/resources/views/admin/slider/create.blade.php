@extends ('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>

            @endif


        <div class="card">
            <div class="card-header">
                <h3>Add Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-end">
                        Back
                    </a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"  rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label>Status</label><br />
                        <input type="checkbox" name="status" style="width: 30px;height:30px"> Checked=Hidden, Unchecked=Visible
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
