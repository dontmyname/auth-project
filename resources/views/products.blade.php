@extends('layouts.backend')
@section('main')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Create Product
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="/admin/products/create" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Product</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Product"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputEmail3"
                                        placeholder="Quantity" name="qty">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Price</label>
                                    <input type="text" class="form-control" id="exampleInputPassword4"
                                        placeholder="Price" name="price">
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="img" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Brand</label>
                                    <input type="text" class="form-control" id="exampleInputCity1" placeholder="Brand"
                                        name="brand">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Production date</label>
                                    <input type="date" class="form-control" id="exampleInputCity1" placeholder="Brand"
                                        name="production_date">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        @foreach ($products as $item)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->name }}</h4>

                        <img src="{{ asset($item->photo) }}" width="fit-content" height="200px" alt="">

                        <div class="d-flex py-4">
                            <div class="preview-list w-100">
                                <div class="preview-item p-0">
                                    <div class="preview-thumbnail">
                                        <img src="http://auth.loc/assets/images/faces/face15.jpg" class="rounded-circle"
                                            alt="">
                                    </div>
                                    <div class="preview-item-content d-flex flex-grow">
                                        <div class="flex-grow">
                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject">{{ $item->get_user->name }}</h6>
                                                <p class="text-muted text-small">{{ $item->qty }} шт.</p>
                                            </div>
                                            <p class="text-muted">{{ number_format($item->price, 0, '.', ' ') }} sum</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted">YULDUZCHALAR </p>
                        <div class="progress progress-md portfolio-progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">Production Date:
                                {{ \Carbon\Carbon::parse($item->production_date)->format('d-m-Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
