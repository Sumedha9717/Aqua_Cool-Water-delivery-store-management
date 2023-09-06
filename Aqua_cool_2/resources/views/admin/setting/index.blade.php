@extends('layouts.admin')

@section('title', 'Setting')

@section('content')

            <div class="row">
                <div class="col-md-12 grid-margin">
                    <form action="{{ url('/admin/settings') }}">
                        @csrf

                        <div class="card mb-3">
                            <div class="card-header bg-primary">
                                <h3 class="text-white mb-0">Website</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Web Site Name</label>
                                    <input type="text" name="website_name" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Web Site Url</label>
                                    <input type="text" name="website_name" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Page Title</label>
                                    <input type="text" name="website_name" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Meta keywords</label>
                                    <textarea name="meta_keywords" class="form-control" row="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" row="3"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-primary">
                                <h3 class="text-white mb-0">Website-Information</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" row="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">phone 1 *</label>
                                    <input type="text" name="phone1" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">phone No. 2</label>
                                    <input type="text" name="phone2" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email Id 1</label>
                                    <input type="text" name="email" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email Id 2</label>
                                    <input type="text" name="email2" class="form-control"/>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>

            </div>

@endsection
