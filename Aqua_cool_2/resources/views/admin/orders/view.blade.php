@extends('layouts.admin')

@section('title','Order Details')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session('message'))
                    <div class="alert alert-success mb-3">{{ session('message') }}</div>
                @endif

                <div class="shadow bg-white p-3">

                    <h2 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-danger float-end">Back</a>

                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-success float-end">
                            Generate Invoice
                        </a>

                        <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning float-end">
                            View Invoice
                        </a>

                        <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-info float-end">
                            Send Invoice
                        </a>
                    </h2>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order ID : {{ $order->id }}</h6>
                            <h6>Tracking No :{{ $order->tracking_no }} </h6>
                            <h6>Payment Mode :{{ $order->payment_mode }} </h6>
                            <h6>Ordered Date :{{ $order->created_at->format('d-m-Y h:i A') }} </h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message : <span class="text-uppercase">{{ $order->status_message }} </span></h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name : {{ $order->fullname }} </h6>
                            <h6>Email : {{ $order->email }}</h6>
                            <h6>Phone : {{ $order->phone }}</h6>
                            <h6>Address : {{ $order->address }}</h6>
                            <h6>Zip Code : {{ $order->pincode }}</h6>
                        </div>

                    </div>
                    <h5> Order Items</h5>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered tabel-striped">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if ($orderItem->product->productImages)
                                                    <img src=" {{ asset($orderItem->product->productImages[0]->image) }} "
                                                    style="width: 50px; height: 50px" alt="imag">
                                                @else
                                                    <img src=" "
                                                    style="width: 50px; height: 50px" alt="imag">
                                                @endif
                                        </td>

                                        <td>
                                            {{$orderItem->product->name }}
                                        </td>

                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        <td width="10%">Rs.{{ $orderItem->price }}</td>
                                        {{-- <td width="10%">{{ $orderItem->quantity }}</td> --}}
                                        <td width="10%" class="fw-bold">Rs. {{ $orderItem->quantity * $orderItem->price}}</td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount: </td>
                                        <td colspan="1" class="fw-bold">Rs.{{ $totalPrice }}</td>
                                    </tr>
                            </tbody>
                        </table>
                        <div>
                            {{-- {{ $order->links()}} --}}
                        </div>
                    </div>


                    <div class="card border mt-3">
                        <div class="card-body">
                            <h4>Order Process (Order Status Updates)</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <label>Update Your Order Status</label>
                                        <div class="input-group">
                                            <select name="order_status" class="form-select">
                                                <option value="">Select Order Status</option>
                                                    <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >In Progress</option>
                                                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Completed</option>
                                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Pending</option>
                                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Cancelled</option>
                                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Out-for-delivery</option>
                                            </select>

                                            <button type="submit" class="btn btn-success text-white">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <br/>
                                    <h4 class="mt-3">Current Order Status: <span class="text-uppercase btn btn-info text-white">{{ $order->status_message }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        {{-- <div class="card">
            <div class="card-body">
                <h4>Order Process (Order Status Updates)</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Update Your Order Status</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">Select Order Status</option>
                                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >In Progress</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Completed</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Pending</option>
                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Cancelled</option>
                                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Out-for-delivery</option>
                                </select>

                                <button type="submit" class="btn btn-success text-white">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <br/>
                        <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span></h4>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</div>

@endsection

